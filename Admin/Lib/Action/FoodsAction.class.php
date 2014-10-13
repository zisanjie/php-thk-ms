<?php
class FoodsAction extends PublicAction{
        //查询车辆
       public function selFoods(){
            
            $foods = M('Foods');
            $data = $foods->select();
            $this->assign('data', $data);
            $this->display('selFoods');
       }

        //添加车辆
        public function addFoods(){
            $sclass = M('Sclass');
            $sdata = $sclass->field('id,sname')->select();            
            $this->assign('sdata',$sdata);
            $this->display();
        }

        public function ins(){

            foreach($_POST as $k=>$v){

                     $v = trim($v);
                   if(!$v){
                        $this->error('添加车辆失败，请检测输入!');
                   }else{                        
                        $_POST[$k] = $v;
                    }
            }
       
            $_POST['regtime']=time();
            $file = $this->upload('./Uploads/Foods/',true,120,120,false);
            $_POST['pic'] = $file;

            if(!$file){
                $this->error('没有上传车辆图片!');
            }

            $foods = M('Foods');
            
            if($foods->add($_POST)){
                
                $this->redirect('Foods/selFoods');     //显示列表信息
            }else{
                
                $this->display('addFoods');
            }

    }
        //修改车辆
         public function upFoods(){

            $id = trim($_GET['id']);
            $foods = M('Foods');
            $driver = M('Driver');

            $data = $foods->find($id);
            $this->assign('data', $data);

            $where['car_id'] = array('EQ',$id);
           // $ddata = $driver -> where($where['car_id'])->find();
            $ddata = $driver -> where($where['car_id'])->select();
            $this->assign('ddata',$ddata);
            

            $sclass = M('Sclass');
            $sdata = $sclass->field('id,sname')->select();
            $this->assign('sdata',$sdata);

            $this->display();
        }
        public function up(){
            $_POST['start_time'] = strtotime($_POST['start_time']);
            $_POST['end_time'] = strtotime($_POST['end_time']);

            foreach($_POST as $k=>$v){

                     if(empty($v)){

                            unset($_POST[$k]);
                    }else{

                            $_POST[$k] = trim($v);
                    }
            }
            //获取当前时间
            $_POST['regtime']=time();
           
            $file = $this->upload('./Uploads/Foods/',true,120,120,false);
            if($file){
                $_POST['pic'] = $file;
            }


            $foods = M('Foods');

            if($foods->save($_POST)){

                $this->redirect('Foods/selFoods');     //显示列表信息
            }else{
                
                $this->error('操作失败!');
            }
        }

        //删除操作
          public function del(){

                $id = trim($_GET['id']);

                $foods = M('Foods');

                if($foods->delete($id)){
                        $this->success('删除数据成功!');
                }else{
                        $this->error('删除数据失败!');
                }


        }


        //添加优惠信息
        function addFav(){
            $id = trim($_GET['id']);
            $foods = M('Foods');     

            $dangqian = date('Y-m-d H:i:s',time());
            $start_time = $this->date('start_time',$dangqian); 
            $this->assign('start_time',$start_time);

            $endtime = $this->date('end_time',$dangqian); 
            $this->assign('endtime',$endtime);

            $fdata = $foods->field('id,name,price,yprice,start_time,end_time')->find($id);
            $this->assign('fdata',$fdata);
            $this->display();
        }

        //显示进行中的优惠信息
        function showFav(){
            
            $foods = M('Foods'); 
            $t = time();
            $where = array();
            $where['price'] = array('NEQ','yprice');
            $where['start_time'] = array('LT',$t);
            $where['end_time'] = array('GT',$t);
            $fdata = $foods
                        ->where($where)
                        ->select();
            $this->assign('fdata',$fdata);
            $this->display();
        }

        //删除优惠信息
        function delFav(){
            $id = trim($_GET['id']);
            $data = array('id'=>$id,'yprice'=>'','start_time'=>'','end_time'=>'');
            $foods = M('Foods');

            if($foods->save($data)){

                $this->redirect('Foods/showFav');     //显示列表信息
            }else{
                
                $this->display('upFoods');
            }
        }


        //显示所有优惠历史信息
        function listFav(){
            
            $foods = M('Foods'); 
            $t = time();
            $where = array();
            $where['price'] = array('NEQ','yprice');
            $where['yprice'] = array('NEQ','');
            $where['end_time'] = array('LT',$t);            
            $fdata = $foods
                        ->where($where)
                        ->select();
           
            $this->assign('fdata',$fdata);
            $this->display();
        }
}