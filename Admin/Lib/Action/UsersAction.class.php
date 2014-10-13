<?php
// 本类由系统自动生成，仅供测试用途
class UsersAction extends PublicAction {
    
    public function addPage(){
        $this->display();
    }

    public function listPage(){
        $user = M('Users');
        $udata = $user->select();
        $this->assign('udata', $udata);
        $this->display();
    }

    function editPage(){
    	$user = M('Users');
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

    	$user = M('Users');
    	 if($user->save($_POST)){

                $this->redirect('Users/listPage');     //显示列表信息
            }else{
                $id = $_POST['id'];
                $this->redirect("Users/editPage/id/".$id);
            }

    }


    function del(){
    	
    	$user = M('Users');
	if($user->delete(trim($_GET['id']))){

	    $this->success('删除数据成功!');
	}else{
	   
	    $this->error('删除数据失败!');
	}
    }

    function addManage(){    	
    	$this->display();
    }

    /*添加管理员*/
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

    	$man = M('Admin');

    	if($man->add($_POST)){
    		 $this->redirect('Users/listManage');
    	}else{
    		$this->error('添加用户失败!');
    	}

    }

    /* 显示管理员信息 */
    function listManage(){

        $man = M('Admin');
        $data = $man->select();        
        //查询用户权限
        $roles = M('roles');
        foreach($data as &$row){
            $role = $roles->find($row['roles']);
            $row['roles'] = $role['name'];
        }
        
        $this->assign('data',$data);
        $this->display();
    }

    function delManage(){
        $admin = M('Admin');
        
        if($admin->delete(trim($_GET['id']))){
            $this->success('删除数据成功!');
        }else{
           
            $this->error('删除数据失败!');
        }
    }

}