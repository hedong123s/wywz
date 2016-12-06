<?php 
class DatabaseAction extends BaseAction{

	
	function  index(){
		$row=M()->query('show tables from '.C('DB_NAME'));
		foreach($row as $key=>$v){
			$row[$key]['dbname']=$row[$key]['Tables_in_'.C('DB_NAME')];
			$row[$key]['countnum']=M(str_replace(C('DB_PREFIX'),'',$row[$key]['dbname']))->count();
		}
		$this->assign("list",$row);
		$this->display();
	}


	function optimize(){
		$dbname=$_REQUEST['db'];
		if(empty($dbname)) $this->msg('请选择表',U('',array('c'=>'list')),1);
		if(is_array($dbname)){
			foreach($dbname as $key=>$v){
				M()->query("OPTIMIZE TABLE `$v` ");	
			}
			
		}else{
			M()->query("OPTIMIZE TABLE `$dbname` ");
		}
		$this->msg("数据表优化完毕",U('index'));

	}

	function repair(){
		$dbname=$_REQUEST['db'];
		if(empty($dbname)) $this->msg('请选择表',U('',array('c'=>'list')),1);
		if(is_array($dbname)){
			foreach($dbname as $key=>$v){
				M()->query("REPAIR TABLE `$v` ");	
			}
			
		}else{
			M()->query("REPAIR TABLE `$dbname` ");
		}
		$this->msg("数据表修复完毕",U('index'));

	}

	function struct(){
		$dbname=$_REQUEST['db'];
		if(empty($dbname)) $this->msg('请选择表',U('',array('c'=>'list')),1);
		$this->assign('list',M()->query("SHOW FULL COLUMNS FROM `$dbname` "));
		$this->display('struct');
	}

	//备份

	function backup(){
		$dbname=$_REQUEST['db'];
		$isstruct=intval($_POST['isstruct']);
		if(empty($_POST['fsize']))    $fsize = 2048;  //分卷大小，单位KB
		$fsizeb = $fsize * 1024;             //分卷大小，单位K

		if(empty($isstruct)){
	 foreach ($dbname as $v){
	  

		  
		  $rs=M()->query('select * from '.$v);
		 
		  if(count($rs)<=0){
			  continue;
		  }

	   $sql.="--\r\n";
	   $sql.="-- 数据表中的数据: `$v`\r\n";
	   $sql.="--\r\n\r\n";

		  foreach ($rs as $k=>$vv){

			  $sql.="INSERT INTO `$v` VALUES (";
		   foreach ($vv as $key=>$value){
			   if($value==''){
				   $value='null';
			   }
			   $type=gettype($value);
			   if($type=='string'){
				   $value="'".$value."'";
			   }
			   $sql.="$value," ;
		   }
		   $sql.=");\r\n\r\n";
			 }
	  }
	  $record= str_replace(',)',')',$sql);
	  $datatype='V';
		}else{
			$sql.="-------------------------------------\r\n";
			$sql.="---------".date("Y-m-d H:i:s")."---------\r\n";
			$sql.="-------------------------------------\r\n";
			  foreach ($dbname as $v){
			   $tbName=$v;
			   $result=M()->query('show columns from '.$tbName);

			   $sql.="--\r\n";
			   $sql.="-- 数据表结构: `$tbName`\r\n";
			   $sql.="--\r\n\r\n";
			   $sql.="DROP TABLE IF EXISTS `$tbName`;\r\n";
			   $sql.="create table `$tbName` (\r\n";
			   $rsCount=count($result);
			   foreach ($result as $k=>$v){
					   $field  =       $v['Field'];
					   $type   =       $v['Type'];
					   $default=       $v['Default'];
					   $extra  =       $v['Extra'];
					   $null   =       $v['Null'];
				 if(!($default=='')){
				  $default='default '.$default;
				 }      
					   if($null=='NO'){
						   $null='not null';
					   }else{
						   $null="null";
					   }          
					   if($v['Key']=='PRI'){
							   $key    =       'primary key';
					   }else{
							   $key    =       '';
					   }
				 if($k<($rsCount-1)){
				  $sql.="`$field` $type $null $default $key $extra ,\r\n";
				 }else{
				  //最后一条不需要","号
				  $sql.="`$field` $type $null $default $key $extra \r\n";
				 }


			   }
			   $sql.=")engine=innodb charset=utf8;\r\n\r\n";
			  }
			  $struct=str_replace(',)',')',$sql);
			  $datatype='S';
			  
			}
		
	 
		  $sqls=$struct.$record;
		  $dir="data/backup/".$datatype.date("Y-m-d_H-i-s").".sql";
		
		  file_put_contents($dir,$sqls);
		  if(file_exists($dir))
		  {
			$this->msg("数据备份成功",U('index'));
		  }else
		  {
			$this->msg("数据备份失败",U('index'));
		  }

	}


	//数据还原
	function import(){
		$dir=opendir('data/backup/');
		$i=0;	
		while(($filename=readdir($dir))!==false){
			$file = fopen('data/backup/'.$filename,"r");
			if($filename!='.' && $filename!='..'){
				$list[$i]['filename']=$filename;
				$list[$i]['fileinfo']=fstat($file);
			}
			$i++;
		}

		$this->assign('list',$list);
		$this->display('import');
	}


	//删除备份
	function backup_del(){
	
		$filename=$_REQUEST['filename'];
		if(empty($filename)) $this->msg('请选择备份文件',U('import'),1);
		if(is_array($filename)){
			foreach($filename as $key=>$v){
				@unlink('data/backup/'.$v);
			}
		}else{
				@unlink('data/backup/'.$filename);
		}
		
		$this->msg("备份文件删除成功",U('import'));
	}


}


?>