<?php
// 本类由系统自动生成，仅供测试用途
class HotelsAction extends PublicAction {
    
    public function addPage(){
        $this->display();
    }

    public function listPage(){
        $user = M('Hotels');
        $udata = $user->select();
        $this->assign('udata', $udata);
        $this->display();
    }

    function editPage(){
    	$user = M('Hotels');
    	$uid = $_GET['id'];
        	$udata = $user->find($uid);
        	$this->assign('data', $udata);
        	$this->display();
    }
    function mod(){
    	foreach($_POST as $k=>$v){

                     if(empty($v)){

                            unset($_POST[$k]);
                    }else{

                            $_POST[$k] = trim($v);
                    }
            }
            $password = $_POST['userpwd'];
            $ip = get_client_ip();
            $_POST['regip'] = get_client_ip();

            if(!empty($password)){
            	$_POST['userpwd'] = md5($password);
            }

    	$user = M('Hotels');
    	 if($user->save($_POST)){

                $this->redirect('Hotels/listPage');     //显示列表信息
            }else{
                $id = $_POST['id'];
                $this->redirect("Hotels/editPage/id/".$id);
            }

    }


    function del(){
    	
    	$user = M('Hotels');
	if($user->delete(trim($_GET['id']))){

	    $this->success('删除数据成功!');
	}else{
	   
	    $this->error('删除数据失败!');
	}
    }
	function addHotel(){    	
    	$this->display();
    }

    /*添加酒店*/
    function ins(){
    	foreach($_POST as $k=>$v){

                     $v = trim($v);
                   if(!$v){
                        $this->error('添加失败，请检测输入!');
                   }else{                        
                        $_POST[$k] = $v;
                    }
            }

            $_POST['userpwd'] = md5($_POST['userpwd']);

    	$man = M('Hotels');

    	if($man->add($_POST)){
    		 $this->redirect('Hotels/listPage');
    	}else{
    		$this->error('添加用户失败!');
    	}

    }

}