<?php
// 本类由系统自动生成，仅供测试用途
class WebconfigAction extends PublicAction {
    
    public function webedit(){

    	$web = M('Webconfig');
    	$data = $web->select();          
    	$this->assign('data',$data[0]);
	$this->display();     	
    }

    public function mod(){

            foreach($_POST as $k=>$v){                   
                   
                    if(empty($v)){

                            unset($_POST[$k]);                            
                    }
            }

            //修改上传LOGO
            $file = $this->upload('./Uploads/',true,180,64);
            
            if($file){
                 $_POST['logo'] = $file;
            }
            $_POST['id'] = 0;
            
            $web = M('Webconfig');

            if($web->save($_POST)){
                    $this->success('修改配置信息成功!');
                    /////////////////////////////////////
                    //删除除了默认的以外的原图
            }else{
                    $this->error('修改配置信息失败!');
            }
    }

    public function sysinfo(){
            $out = array();

            $out['php'] = PHP_VERSION;
            $out['mysql'] = mysql_get_server_info();

            if(function_exists('gd_info')){

                $gd = gd_info();
                $out['gd'] = $gd['GD Version'];
            }else{

                $$out['gd'] = '未知';
            }
          $this->assign('system', $out);
    	$this->display();    	
    }

}