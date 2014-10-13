<?php
	class LoginAction extends PublicAction{

		public function login(){
			
			$this->display();			
		}
		public function reg(){
			
			$this->display();			
		}

		Public function verify(){
			    import('ORG.Util.Image');
			    Image::buildImageVerify();
		}

		// 用户注册
	   	public function checkReg(){
			$username=trim($_POST['username']);
			$userpwd=md5(trim($_POST['userpwd']));
			$email=trim($_POST['email']);

			$truename=trim($_POST['truename']);
			$address=trim($_POST['address']);
			$phone=trim($_POST['phone']);

			if($_SESSION['verify'] != md5($_POST['verify'])) {
 				$this->error('验证码错误！');
 			}
			$user = M('Users');
			$user->username=$username;
			$user->userpwd=$userpwd;
			$user->email=$email;

			$user->truename=$truename;
			$user->address=$address;
			$user->phone=$phone;

			$user->regtime=time();
			$user->money = 30;
			$con = $user->add();

			if($con>0){
				// session('uid',$id);
				// session('uname',$username);
				// session('umoney',30);
				// session('uheadpic','headpic.jpg');
				// session('uemail',$email);			
				// session('upost',1);
				$this->success('注册成功！','__APP__/Index/index',3);	
				session('uid',$con);
				session('uname',$username);
				session('umoney',30);
				session('uheadpic','headpic.jpg');
				session('uemail',$email);

				session('utruename',$truename);
				session('uaddress',$address);
				session('uphone',$phone);

			}else{
				$this->error('注册失败！请您正确填写！','__APP__/Login/reg',3);
			}
	   	}


	    	public function yzuser(){
			$user = M('Users');
			$data = $user ->where(array("username"=>$_POST['username'])) ->find();

			if(isset($data)){
				$data="exist";
			}else{
				$data="noexist";
			}
			$this->ajaxReturn($data,'true',1);
		}

		//AJAX判断邮箱是否存在
		public function yzemail(){
			$user = M('Users');
			$data = $user ->where(array("email"=>$_POST['email'])) ->find();

			if(isset($data)){
				$data="exist";
			}else{
				$data="noexist";
			}
			$this->ajaxReturn($data,'true',1);
		}

		//用户登录
		public function checkLogin(){

			$jizhu = intval($_POST['jizhu']);
			$user = M("Users");
			$hotels = M("Hotels");
			$departments = M("Departments");

			$_POST['userpwd'] = md5(trim($_POST['userpwd']));
			$_POST['username'] = trim($_POST['username']);
			$uname = $_POST['username'];
			$pat = "/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/i";

			if(preg_match($pat,$uname)){
				$_POST['email'] = $uname;
				unset($_POST['username']);
			}

			$userself = $user->where($_POST)->find();
			$hotelself = $hotels->where($_POST)->find();
			$deparmentself = $departments->where($_POST)->find();

			if(!empty($userself)){

				//判断用户Ip是否被禁用
				if(!$this->loginPass()){
					echo '<script>alert("您已被禁止登录，请联系管理员!");window.location.href="'.$_SERVER['root'].'/ms/index.php/Us/contact2Us";</script>';exit;
				}
				//设置用户主键
				$this->selfID = $userself['id'];
				
				//设置用户session
				$id = $userself['id'];		
				
				session('uid',$id);
				session('uname',$userself['username']);
				session('umoney',$userself['money']);
				session('uheadpic',$userself['headpic']);
				session('uphone',$userself['phone']);
				session('uaddress',$userself['address']);
				session('uemail',$userself['email']);
				session('utruename',$userself['truename']);
				session('upost',$userself['post']);

				if($jizhu){
					setcookie('username',$userself['username'],time()+7*24*3600,'/');
				}			

				unset($userself);

				$data = $user ->where(array("username"=>$_POST['username'])) ->find();
				if(isset($data)){
					$data="user_login";
				}else{
					$data="nouser_login";
				}
					
				$this->redirect('/Ucenter/index/histroy');	
			}
			
			
			else if(!empty($hotelself)){
			//判断用户Ip是否被禁用
				if(!$this->loginPass()){
					echo '<script>alert("您已被禁止登录，请联系管理员!");window.location.href="'.$_SERVER['root'].'/ms/index.php/Us/contact2Us";</script>';exit;
				}
				//设置用户主键
				$this->selfID = $hotelself['id'];
				
				//设置用户session
				$id = $hotelself['id'];		
				
				session('uid',$id);
				session('uname',$hotelself['username']);
				session('umoney',$hotelself['money']);
				session('utruename',$hotelself['truename']);
				session('uphone',$hotelself['phone']);
				session('uaddress',$hotelself['address']);
				session('ureceiving',$hotelself['receiving']);
				session('uabout',$hotelself['about']);

				if($jizhu){
					setcookie('username',$hotelself['username'],time()+7*24*3600,'/');
				}			

				unset($hotelself);

				$data = $hotels ->where(array("username"=>$_POST['username'])) ->find();
				if(isset($data)){
					$data="user_login";
				}else{
					$data="nouser_login";
				}
					
				$this->redirect('/Hcenter/index/histroy');	
		}
		
		else if (!empty($deparmentself))
		{
			//判断用户Ip是否被禁用
				if(!$this->loginPass())
				{
					echo '<script>alert("您已被禁止登录，请联系管理员!");window.location.href="'.$_SERVER['root'].'/ms/index.php/Us/contact2Us";</script>';exit;
				}
				//设置用户主键
				$this->selfID = $deparmentself['id'];
				
				//设置用户session
				$id = $deparmentself['id'];		
				
				session('uid',$id);
				session('uname',$deparmentself['username']);
				session('dname',$deparmentself['name']);
				session('umoney',$deparmentself['money']);
				session('uphone',$deparmentself['phone']);
				session('uaddress',$deparmentself['address']);
				session('uemail',$deparmentself['email']);
				session('utruename',$deparmentself['truename']);
				session('uhotel',$deparmentself['hotel']);
				session('uabout',$deparmentself['about']);

				if($jizhu)
				{
					setcookie('username',$deparmentself['username'],time()+7*24*3600,'/');
				}			

				unset($deparmentself);

				$data = $departments ->where(array("username"=>$_POST['username'])) ->find();
				if(isset($data))
				{
					$data="user_login";
				}
				else
				{
					$data="nouser_login";
				}
					
				$this->redirect('/Dcenter/index/histroy');	
			}
			 
			else   
			{

				$this->error("用户名或密码错误!");
			}	
		}  

		function safe(){
			$this->display();
		}

		
		
		
		/*找回密码*/
		function getPass(){

			foreach($_POST as $k=>$v){
				$_POST[$k] = trim($v);
			}

			$user = M('Users');
			$userself = $user->where($_POST)->find();

			if($userself){

				//设置用户主键
				$this->selfID = $userself['id'];
				
				//设置用户session
				$id = $userself['id'];		
				
				session('uid',$id);
				session('uname',$userself['username']);
				session('umoney',$userself['money']);
				session('uheadpic',$userself['headpic']);
				session('uphone',$userself['phone']);
				session('uaddress',$userself['address']);
				session('uemail',$userself['email']);
				session('utruename',$userself['truename']);
				$this->redirect('Ucenter/index',array('money'=>'money'));
			}else{
				$this->redirect('Index/index');
			}
		}
	}