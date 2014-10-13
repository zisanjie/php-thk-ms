<?php
//友情链接
class FriendlinksAction extends PublicAction {

    public function addLinks(){
            $this->display();
    }

    public function ins(){
            foreach($_POST as $k=>$v){

                     $v = trim($v);
                   if(!$v){
                        $this->error('添加失败，请检测输入!');
                   }else{                        
                        $_POST[$k] = $v;
                    }
            }

            $links = M('Friendlinks');

            $file = $this->upload('./Uploads/FriendLinks/',true,35,35);
            
            if($file){
                 $_POST['pic'] = $file;
            }
                        
            if($links->add($_POST)){
                
                $this->redirect('Friendlinks/listLinks');     //显示列表信息
            }else{
                
                $this->display('addLinks');
            }
    }

    // public function editLinks(){
    //         $links = M('Friendlinks');
    //         $id = trim($_GET['id']);
    //         if(empty($id)){
    //                  $this->redirect('Index/login.html');     //显示列表信息
    //                  exit;
    //         }
    //         $data = $links->where('id='.$id)->select();  

    //         $this->assign('data',$data[0]);
    //         $this->display();
    // }

    public function listLinks(){
            $links = M('Friendlinks');
            $data = $links->select();            
            $this->assign('data',$data);
            $this->display();
    }

    public function del(){

        $id = trim($_GET['id']);
        $links = M('Friendlinks');

        if($links->delete($id)){
                $this->success('删除数据成功!');
        }else{
                $this->error('删除数据失败!');
        }
    }

    // //按条件查询
    // public function sel(){
    //         foreach($_POST as $k=>$v){

    //                  if(empty($v)){
    //                         unset($_POST[$k]);
    //                 }
    //         }

    //         $links = M('Friendlinks');

    //         if(empty($_POST)){

    //                 $data = $links->select();
    //         }else{
                    
    //                 $data = $links->where($_POST)->select();
    //         }

    //         $this->assign('data', $data);
    //         $this->display('listLinks');
    // }
}