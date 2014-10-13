<?php
class IpAction extends PublicAction {
    
    public function addPage(){
            $this->display();
    }

    public function ins(){

            foreach($_POST as $k=>$v){

                     if(empty($v)){

                            unset($_POST[$k]);
                    }else{

                            $_POST[$k] = ip2long(trim($v));
                    }
            }

            $ip = M('Ip');

            if(empty($_POST['end_IP'])){
                $_POST['end_IP'] = $_POST['start_IP'];
            }
            
            if(!empty($_POST) && $ip->add($_POST)){
                
                $this->redirect('Ip/listPage');     //显示列表信息
            }else{
                
                $this->display('addPage');
            }

    }

    public function listPage(){
            $ip = M('Ip');
            $data = $ip->select();
            $this->assign('data', $data);
            $this->display('listPage');
    }

    public function del(){

        $id = trim($_GET['id']);
        $ip = M('Ip');

        if($ip->delete($id)){
                $this->redirect('Ip/listPage');     //显示列表信息
        }else{
                $this->display('Ip:addPage!');
        }
    }   

    
}