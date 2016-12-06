<?php 

class SettingAction extends BaseAction{

	
	function index(){
		$t=M('webconfig');
		//组
		$vargroup=array(
				array('id'=>1,'title'=>'基本设置'),
				//array('id'=>6,'title'=>'企业信息'),
				//array('id'=>2,'title'=>'附件配置'),
				//array('id'=>3,'title'=>'性能配置'),
				//array('id'=>4,'title'=>'会员配置'),
				//array('id'=>5,'title'=>'互动配置'),
				
				//array('id'=>10,'title'=>'水印配置'),
				//array('id'=>11,'title'=>'邮箱配置'),
		);

		//内容
		foreach($vargroup as $key=>$v){
			$row[$v['id']]['list']=$t->where(array('vargroup'=>$v['id']))->order("orderid desc,id asc")->select();
		}
		$this->assign('list',$row);
		$this->assign('vargroup',$vargroup);
		$this->display();
	}

	//添加变量
	function add_var(){
		$t=M('webconfig');
		if($t->create($_POST['add_var'])){
			//不能重复
			if($t->where(array('varname'=>trim($_POST['add_var']['varname'])))->find()){
				$this->msg('变量名称不能重复',U('index'),1);
			}
			
			if($t->add()){
				$this->msg('数据添加成功',U('index'));
			}else{
				$this->msg('数据添加失败','',1);
			}
		}else{
			$this->msg('数据创建失败','',1);
		}
		
	}
	
	
	//保存配置
	function update(){
		$t=M('webconfig');
		foreach($_POST as $key=>$v){
			$t->where(array('varname'=>$key))->data(array('varvalue'=>trim($v)))->save();
		}
		$row=$t->select();
		
		//验证运行模式runmode ，动态则删除index.html
		if(empty($_POST['runmode'])){
			if(file_exists('index.html')){
				@unlink('index.html');
			}
		}elseif($_POST['runmode']==1){ //纯静态 ，生成首页
			
			
			echo '<script src="'.APP_PATH.'Modules/Admin/Tpl/js/jquery.js"></script>';
			echo '<script type="text/javascript">$.get("'.U('Home/Html/create_index').'");</script>';
		
		}
	
		
		
		
		//写入文件
		$str.='<?php return array('."\r\n";
		
		foreach($row as $key=>$v){
			$str.="'cfg_".$v['varname']."'=>'".trim($v['varvalue']). "',\r\n";
		}
		
		$str.=')?>';

		$fp=fopen(APP_PATH.'Conf/config_cache.php','w');
		flock($fp, 3);
		
		if(fwrite($fp,$str)){
			fclose($fp);
			$this->msg('成功保存变量并更新配置文件！',U('index'));
			
			
			
		}else{
			fclose($fp);
			$this->msg('配置文件更新失败，可能是由于没有写入权限！',U('index'));
		}	
		
	}
	
	//水印
	function update_wmk(){
		
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		//$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  'data/watermark/';// 设置附件上传目录

		if(!empty($_FILES['watermarket']['tmp_name'])){
		
			if($upload->upload()) {
				$info =  $upload->getUploadFileInfo();
			}
			$_POST['markpicurl']='data/watermark/'.$info[0]['savename'];
		}else{

			$_POST['markpicurl']=$_POST['markpicurl'];
		}
		

		$str.='<?php return array('."\r\n";
			foreach($_POST as $key=>$v){
				$str.="'cfg_".$key."'=>'".trim($v). "',\r\n";
			}
		$str.=')?>';
		$fp=fopen(APP_PATH.'Conf/watermark_cache.php','w');
		flock($fp, 3);
		if(fwrite($fp,$str)){
			fclose($fp);
			$this->msg('水印配置成功！',U('index',array('tab'=>10)));
		}else{
			fclose($fp);
			$this->msg('配置文件更新失败，可能是由于没有写入权限！',U('index',array('tab'=>10)));
		}
	}
	
	
	//邮件
	function update_email(){
		
		$str.='<?php return array('."\r\n";

			foreach($_POST as $key=>$v){

				$str.="'cfg_".$key."'=>'".trim($v). "',\r\n";
			}
		$str.=')?>';
		$fp=fopen(APP_PATH.'Conf/email_cache.php','w');
		flock($fp, 3);
		if(fwrite($fp,$str)){
			fclose($fp);
			$this->msg('邮箱配置成功！',U('index',array('tab'=>11)));
		}else{
			fclose($fp);
			$this->msg('配置文件更新失败，可能是由于没有写入权限！',U('index',array('tab'=>11)));
		}
	
	}
	
	//测试发邮件
	function public_test_mail(){
			
		$mail_type=intval($_POST['mail_type']);
		$mail_server=trim($_POST['mail_server']);
		$mail_port=trim($_POST['mail_port']);
		$mail_from=trim($_POST['mail_from']);
		$mail_user=trim($_POST['mail_user']);
		$mail_password=$_POST['mail_password'];
		$mail_to=trim($_POST['mail_to']);

		if($mail_type==1){
			require_once('data/phpmailer/sendemail.php');
			if(sendemail($mail_from,$mail_user,$mail_password,$mail_to,' ','',$mail_server,$mail_port)){
				echo '邮件可以正常发送';
			}else{
				echo '邮件发送失败';
			}
		}else{
			echo '不支持邮件发送';
		}

		
		exit();	
		
	}
	
	
	
	
}


?>