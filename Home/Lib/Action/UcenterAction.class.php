<?php
	class UcenterAction extends PublicAction{

		public function __construct(){
			parent::__construct();
			$this->_gotoIndexPage();
		}

		 function upaddress(){
			$User=D('users');
			//接受表单数据
			if($User->create()){
				$result=$User->save();
				if($result){
					session('uaddress',$_POST['address']);
					$this->Success("操作成功");
				}else{
					$this->Success("操作失败");
				}
			}else{
				$this->error($User->getError());
			}
		}
		 function update(){
			$User=D('users');
			//接受表单数据
			if($User->create()){
				$result=$User->save();
				if($result){
					session('utruename',$_POST['truename']);
					session('uphone',$_POST['phone']);
					$this->Success("操作成功");
				}else{
					$this->Success("操作失败");
				}
			}else{
				$this->error($User->getError());
			}
		}

		/**
	    	 * 订单归集显示页面
	    	 *
	    	 */
	    	function index(){

	    		$forms = M('Forms');

	    		import('ORG.Util.Page');// 导入分页类
	    		$uid = session('uid');
	    		$dat = $forms
	    				->field('id')
	    				->where('uid='.$uid)
	    				->group('form_number')    				
	    				->select();// 查询满足要求的总记录数
	    		$count = count($dat);
	    		unset($dat);
	    		// dump($count);exit;
	    		$Page = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
			$show = $Page->show();// 分页显示输出

	    		$data = $forms
	    				->where('uid='.$uid)
	    				->group('form_number')
	    				->order('ftime desc')
	    				->limit($Page->firstRow.','.$Page->listRows)
	    				->select();
	    		$user = M('Users');
	    		$now = time();

	    		foreach($data as &$row){
	    			$uid = $row['uid'];
	    			$udata = $user->find($uid);
	    			$row['phone'] = $udata['phone'];
	    			$row['address'] = $udata['address'];

	    			if($now >= $row['ftime'] && 1 == $row['status']){
	    				$row['status'] = 3;	    				
	    			}
	    		}

	    		$this->assign('page', $show);
	    		$this->assign('data',$data);
	    		$this->display();	    		
	    	}

	    	function alterpwd(){
	    		$user=M('Users');
	    		$id=$_POST['id'];
	    		$email=$_POST['email'];
	    		$data['userpwd']=md5(trim($_POST['userpwd']));
	    		$result=$user
	    				->where("id='$id' and email='$email'")
	    				->find();
	    		if($result){
	    			$res=$user->where("id=$id")->save($data);
	    			if($res){
		 			$this->Success("操作成功");
				}else{
					$this->Success("操作失败");
				}
	    		}else{
	    			$this->Success("操作失败");
	    		}
	    	}

	    	function headpic(){
			$User=M('users');
			$lastheadpic=$_POST['lastheadpic'];
			$data['id']=$_POST['id'];
			$file = $this->upload('./Uploads/Users/',true,200,200,true);
			if($file){
		                $data['headpic'] = $file;
		            }
		            if($User->save($data)){
		            	if(session('uheadpic')=='headpic.jpg'){
		            		session('uheadpic',$file);
					$this->Success("操作成功");
				}else{
					unlink("./Uploads/Users/thumb/".$lastheadpic);
					session('uheadpic',$file);
					$this->Success("操作成功");
				}
			}else{
				$this->Success("操作失败");
			}
		}
	}