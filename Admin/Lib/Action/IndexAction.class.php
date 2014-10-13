<?php
class IndexAction extends PublicAction {
    
    public function index(){

  	     $Webconfig=D('webconfig');
  	     $result = $Webconfig->select();
  	     $title=$result[0]['title'];
  	     session('webtitle',$title);
      	//判断用户是否登录
      	if(empty($mid)){
      		$this->display('login');	
      	}else{
      		$this->display('main');	
      	}
    }

    public function login(){
      $this->display();
    }

   public function do_login(){
   	
 //   	if($_SESSION['verify'] != md5($_POST['verify'])) {
 //   		$this->error('验证码错误！');
	// }

	// session('verify',null); 		// 删除验证码
	// unset($_POST['verify']);	//删除post中无用数据

	$user = M("Admin");

	$_POST['userpwd'] = md5($_POST['userpwd']);

	$userself = $user->where($_POST)->find();

	if(!empty($userself)){
		//设置用户主键
		$this->selfID = $userself['id'];
		//设置用户状态为在线
		$user->save(array('id'=>$this->selfID,'status'=>1));

		//设置后台用户session
		$id = $userself['id'];		
		$roles = $userself['roles'];
		session('mid',$id);
		session('mname',$userself['username']);
		session('mheadpic',$userself['headpic']);
		session('memail',$userself['email']);
		session('mroles',$roles);           
		unset($userself);

		$this->redirect('Index/main');	
	} else {

		$this->error("用户名或密码错误!",'Index/index');
	}

   }

    // /* 生成验证码 */
    // Public function verify(){
    //     import('ORG.Util.Image');
    //     Image::buildImageVerify();
    // }

   public function main(){
   	//获取所有管理员的信息
   	$admin = M("Admin");
   	$adata = $admin
   			->field('id as mid,username,headpic,roles,status')
   			->order(array('status'=>'asc','username'=>'asc'))
   			->select();

   	$this->assign('admin', $adata);
   	$this->display('main');
   }

}