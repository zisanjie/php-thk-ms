<?php
// 二级分类
class SclassAction extends PublicAction {
    
    //调用添加二级分类页面
    function addSclass(){
        $bclass =  M('Bclass');
        $bdata = $bclass->field('id,bname')->select();
        $this->assign('bdata',$bdata);
        $this->display();
    }

    //添加二级分类
    function ins(){

            foreach($_POST as $k=>$v){

                   $v = trim($v);
                   if(!$v){
                        $this->error('添加分类失败，请检测输入!');
                   }else{                        
                        $_POST[$k] = $v;
                    }
            }

            $sclass = M('Sclass');
            if($sclass->add($_POST)){
                $this->redirect('Sclass/selSclass');
            }else{
                $this->error('添加分类失败!');
            }

    }

    //查询二级分类信息
    function selSclass(){
        $sclass = M('Sclass');
        $sdata = $sclass->order('orderno asc')->select();
        $bclass = M('Bclass');

        foreach($sdata as &$row){
        		$pid = $row['pid'];
        		$bdata = $bclass->find($pid);
        		$row['bname'] = $bdata['bname'];
        }

        $this->assign('sdata',$sdata);
        $this->display();
    }

    //删除二级分类
    function del(){
        
        $id = trim($_GET['id']);

        $foods = M('Foods');
        $where = array();
        $where['cid'] = array('EQ',$id);    
        $res = $foods->where($where)->find();
       
        if(!empty($res)){            
            $this->error('该分类下存在商品,不允许删除该分类!');exit;
        }

        $sclass = M('Sclass');

        if($sclass->delete($id)){
            $this->redirect('Sclass/selSclass');
        }else{
            $this->error('删除分类失败');
        }
    }
   

}