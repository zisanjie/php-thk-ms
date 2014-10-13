<?php
class RolesAction extends PublicAction {
    
    public function addPage(){
            $this->display();
    }

    public function ins(){

            foreach($_POST as $k=>$v){

                     if(empty($v)){

                            unset($_POST[$k]);
                    }else{

                            $_POST[$k] = trim($v);
                    }
            }

            $roles = M('Roles');
            
            if(!empty($_POST) && $roles->add($_POST)){
                
                $this->redirect('Roles/listPage');     //显示列表信息
            }else{
                
                $this->display('addPage');
            }

    }

    public function listPage(){
            $roles = M('Roles');
            $data = $roles->select();
            $this->assign('data', $data);
            $this->display();
    }

    public function del(){

        $id = trim($_GET['id']);
        $admin = M('Admin');
        if($admin->where('roles='.$id)->find()){
            $this->error('存在该权限用户，不允许删除!');exit;
        }

        $roles = M('Roles');

        if($roles->delete($id)){
                $this->redirect('Roles/listPage');     //显示列表信息
        }else{
                $this->error('删除失败!');
        }

    }

    function addAdmin(){
        //查询用户权限
        $roles = M('roles');
        $role = $roles->select();
        $this->assign('roles',$role);
        $this->display();
    }

    //添加用户权限
    function up(){
        $admin = M('Admin');
        $username = trim($_POST['username']);
        unset($_POST['username']);
        $where = array();
        $where['username'] = $username;
      
        if($admin->where($where)->save($_POST)){

                $this->redirect('Users/listManage');     //显示列表信息
        }else{                
                $this->error("添加管理员失败!");
        }
    }
 

    
}