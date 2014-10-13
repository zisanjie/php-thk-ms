<?php
// 一级分类
class BclassAction extends PublicAction {
    
    //调用添加一级分类页面
    function addBclass(){
        $this->display();
    }

    //添加一级分类
    function ins(){

            foreach($_POST as $k=>$v){

                   $v = trim($v);
                   if(!$v){
                        $this->error('添加分类失败，请检测输入!');
                   }else{                        
                        $_POST[$k] = $v;
                    }
            }

            $file = $this->upload('./Uploads/Bclass/',true,153,130,false);
            
            if($file){
                        $_POST['pic'] = $file;
            }else{
                        $this->error('上传分类图片失败，请重新添加!');
            }

            $bclass = M('Bclass');
            if($bclass->add($_POST)){
                $this->redirect('Bclass/selBclass');
            }else{
                $this->error('添加分类失败!');
            }

    }

    //查询一级分类信息
    function selBclass(){
        $bclass = M('Bclass');        
        $bdata = $bclass->order('orderno asc')->select();
        $this->assign('bdata',$bdata);
        $this->display();
    }

    //删除一级分类
    function del(){
        $bclass = M('Bclass');
        $id = trim($_GET['id']);

        $sclass = M('Sclass');
        $where = array();
        $where['pid'] = array('EQ',$id);    
        $res = $sclass->where($where)->find();
       
        if(!empty($res)){            
            $this->error('该分类下存在二级分类,不允许删除该分类!');exit;
        }

        if($bclass->delete($id)){
            $this->redirect('Bclass/selBclass');
        }else{
            $this->error('删除分类失败');
        }
    }
   

}