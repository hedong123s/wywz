<?php 
class KefuAction extends BaseAction{

	function index(){
		
		$t=M('kefu');

		$row=$t->order("orderid asc,id asc")->select();
		
		
		$this->assign('list',$row);	
			
		$this->display();
		

	}
	
	function add(){

		$this->display('edit');
		
	}
	
	
	function edit(){
		
	
		$t=M('kefu');
		$id=intval($_GET['id']);
		if(!$row=$t->where(array('id'=>$id))->find()){
			$this->msg('数据不存在',U('index'),1);
		}
		
		$this->assign('info',$row);
		$this->display();	
		
	}
	
	function send(){
		
		$t=M('kefu');
		$_POST['info']['checkinfo']=empty($_POST['info']['checkinfo'])?0:1;
		
		if($row=$t->create($_POST['info'])){
			if($row['id']){
				$t->save();
				$this->msg('操作成功',U('index'));
			}else{
				if($t->add()){
					$this->msg('操作成功',U('index'));
				}else{
					$this->msg('操作失败',U('index'),1);
				}
			}
			
		}else{
			$this->msg($t->geterror(),'',1);
		
		}
	
	}

	

	function del(){
		$t=M('kefu');
		$id=$_REQUEST['id'];
		if(is_array($id)){
			foreach($id as $v){
	
			$t->where(array('id'=>$v))->delete();
			}
		}else{
	
			$t->where(array('id'=>$id))->delete();
		}
		
		
		$this->msg('操作成功',U('index'));
	}
	
	function orderid(){
		$t=M('kefu');
	
		foreach($_POST['orderid'] as $key=>$v){
			$t->where(array('id'=>intval($key)))->data(array('orderid'=>intval($v)))->save();
		}
		$this->msg('操作成功',U('index'));
	
	}
	
	
	
	function set(){
		
		if(isset($_POST['send'])){
			
			//写入文件
			$str.='<?php return array('."\r\n";
			
			foreach($_POST as $key=>$v){
				$str.="'cfg_kefu_".$key."'=>'".trim($v). "',\r\n";
			}
			
			$str.=')?>';

			$fp=fopen(APP_PATH.'Conf/kefu.php','w');
			flock($fp, 3);
			
			if(fwrite($fp,$str)){
				fclose($fp);
				$this->msg('操作成功！',U('set'));
	
			}else{
				fclose($fp);
				$this->msg('配置文件更新失败，可能是由于没有写入权限！',U('set'));
			}	
			
			
		}else{
			$this->display();
		}
		
	
	}
	
	
	function tpl(){
		
		if(isset($_POST['send'])){
			
			
		
		}else{
			
			$fileurl='./Public/kefu/';
			$dir=dir($fileurl);
			$key=0;	
			while(($file=$dir->read())!=false){
				if(is_dir($fileurl.$file) && $file!='.' && $file!='..'){
					$list[$key]['dirname']=$file;
					$list[$key]['url']=$fileurl.$file.'/pic.jpg';
				}
				$key++;
			}
			$dir->close();

			$this->assign('list',$list);
			$this->display();	
		
		}
		

	
	}
	
	function show(){
		
		$dirname=$_GET['dirname'];
		if(!file_exists('./Public/kefu/'.$dirname)){
			exit('客服模板不存在！');
		}
		
		$this->assign('kefu_dirname',$dirname);
		$this->assign('dirurl','./Public/kefu/'.$dirname.'/index.html');
		
		$this->display('./Public/kefu/index.html');
	
	}
	
	function qqico(){
		
		array(1,2,3,4,5,6,7,13,14,15,16,19,40,41,43,44,45,46,50,51);
		
	}
	
	


}

?>