<?php 
	class AjaxAction extends Action{
		
		function msg_ajax(){
			$t=M('form');
			$_POST['posttime']=time();
			if($t->create()){
				if($t->add()){
					echo '0';
				}else{
					echo '2';
				}
			}else{
				echo '1';
			}
	
		}
		

		
		
	}

?>