<?php
// 本类由系统自动生成，仅供测试用途
class DriversAction extends PublicAction {
    
    public function addPage(){
        $this->display();
    }

    public function listPage(){
        $user = M('Driver');
        $udata = $user->select();
        $this->assign('udata', $udata);
        $this->display();
    }

    function editPage(){
    	$user = M('Driver');
    	$foods = M('Foods');
    	$uid = $_GET['id'];
        //dump($uid);
    	$udata = $user->find($uid);
    	$where[id] = array('EQ',$udata[car_id]); 
    	$cdata = $foods->where($where)->find();
    	$this->assign('data', $udata);
    	$this->assign('cdata',$cdata);
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
            $password = $_POST['password'];
            $ip = get_client_ip();
            $_POST['regip'] = get_client_ip();

            if(!empty($password)){
            	$_POST['password'] = md5($password);
            }

    	$user = M('Driver');
    	if($user->save($_POST)){
                $this->redirect('Drivers/listPage');     //显示列表信息
            }else{
                $id = $_POST['id'];
                $this->redirect("Drivers/editPage/id/".$id);
            }

    }


    function del(){
    	
    	$user = M('Driver');
	if($user->delete(trim($_GET['id']))){

	    $this->success('删除数据成功!');
	}else{
	   
	    $this->error('删除数据失败!');
	}
    }
	function addDriver(){    	
    	$this->display();
    }

    /*添加客户*/
    function ins(){
    	foreach($_POST as $k=>$v){

                     $v = trim($v);
                   if(!$v){
                        $this->error('添加失败，请检测输入!');
                   }else{                        
                        $_POST[$k] = $v;
                    }
            }

            $_POST['password'] = md5($_POST['password']);

    	$man = M('Driver');

    	if($man->add($_POST)){
    		 $this->redirect('Drivers/listPage');
    	}else{
    		$this->error('添加用户失败!');
    	}

    }

}