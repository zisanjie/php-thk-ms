<?php
	class PostsAction extends PublicAction{
		public function __construct(){
			parent::__construct();
			$this->_gotoIndexPage(); //判断用户是否登录
			$truename = session('utruename');
			$phone = session('uphone');
			if(empty($truename) || empty($phone)){
				$this->redirect('Ucenter/index',array('pass'=>session('uid'))); 
				exit;
			}

			$address = session('uaddress');
			if(empty($address)){
				$this->redirect('Ucenter/address',array('pass'=>md5($phone)));
				exit;
			}
		}
				
		//创建订单
		public function addPosts(){
					
			$foods=M('Foods');
			$in = join(',',$_POST['input']);				
			$where['id'] = array('in',$in);			
			$data = $foods
					->field('id,name,pic,price,yprice')
					->where($where)
					->select();
			$sum = 0;
			foreach($data as $k=>&$row){
				$row['number'] = $_POST['number'][$row['id']];
				$price = empty($row['yprice']) ? $row['price']: $row['yprice'];
				$row['totals'] = $row['number'] * $price;
				$sum += $row['totals'];
			}
			
			if($data){
				session('forms',$data);
				session('total',$sum);
			}else{
				$data = session('forms');
				$sum = session('total');
			}
			
		   	$this->assign('data', $data);
		   	$this->assign('sum', $sum);
		          	$this->display();
		}

		public function finPosts(){
			$ask=trim($_POST['ask']);
			$form_number=$_POST['form_number']='Dcms'.time().rand(0,22);
			session('ask',$ask);
			session('form_number',$form_number);				
			$this->display();
		}

		//将表单信息写入数据库
		 public function finform(){
		 	$adata = session('forms');
		 	$carts = session('carts');		 	
		 	$ask = session('ask');
		 	$form_number = session('form_number');
		 	$uid = session('uid');
		 	$forms =M('Forms');
		 	$cart = M('Carts');
		 	
		 	$indata = array();
		 	$indata['form_number'] = $form_number;
			$indata['ask'] = $ask;
			$indata['uid'] = $uid;
			$indata['ftime'] = time()+24*3600;
		 	$length = count($adata);		 	
		 	$flag = 0;	//是否全部生成订单标记
		 	
			for($i=0; $i<$length; $i++){
				$indata['fid'] = $adata[$i]['id'];				
				$indata['nprice'] = $adata[$i]['totals'];
				$indata['foods_number'] = $adata[$i]['number'];
				$result = $forms->data($indata)->add();

				//添加订单成功
				if($result){					
					unset($adata[$i]);
					unset($carts[$indata['fid']]);
					$where['fid'] = array("eq",$indata['fid']);
					$where['uid'] =array('eq',$uid);
					@$cart
						->where($where)
						->delete();
					foreach($DB_Carts as $k=>$row){
						if($indata['fid'] == $row['fid']){
							unset($DB_Carts[$k]);
						}
					}

				}else{
					$flag = 1;
				}
			}

			session('forms', $adata);
			session('carts', $carts);
			// session('DB_Carts', $DB_Carts);
			
		 	if($flag){
				$this->redirect('Carts/showCarts/');
			}else{	
				
				session('forms', null);	

				//给用户积分
				$where['id'] = array('EQ', session('uid'));
				$set['money']	= session('umoney') + 5;
				$user = M('Users');
				$upd = $user->where($where)->save($set);

				if($upd){
					session('umoney', $set['money']);
				}
				
				session('uMsg',$form_number);
				$this->redirect('Index/index/');
			}
		 }

		 /* 订单详情 */
	    	function details(){
	    		$forms = M('Forms');
	    		$foods = M('Foods');
	    		$user = M('Users');

	    		$form_number = trim($_GET['form_number']);

	    		if($form_number == session('uMsg')){
	    			session('uMsg',null);	    			
	    		}

	    		$where['form_number'] = array('EQ',$form_number);
	    		$data = $forms->where($where)->select();

	    		$ud = $user->find($data[0]['uid']);
	    		$udata['id']	 =   $data[0]['uid'];	    		
	    		$udata['ftime']	 =   $data[0]['ftime'];
	    		$udata['ask']	 =   $data[0]['ask'];
	    		$udata['form_number'] =   $data[0]['form_number'];
	    		$udata['status'] =   $data[0]['status'];
	    		$udata['username'] =   $ud['username'];
	    		$udata['truename'] =   $ud['truename'];
	    		$udata['address'] =   $ud['address'];
	    		$udata['phone'] =   $ud['phone'];
	    		$sum = 0;				    		

	    		foreach($data as &$row){
	    			$fdata = $foods->find($row['fid']);
	    			$row['foodname'] = $fdata['name'];
	    			$row['price'] = $fdata['price'];
	    			$row['yprice'] = $fdata['yprice'];
	    			$sum += $row['nprice'];
	    			unset($row['ftime']);
	    			unset($row['uid']);
	    			unset($row['ask']);
	    			unset($row['form_number']);
	    			unset($row['status']);
	    		}	    		
	    		$udata['sum'] =   $sum;	    		
	    		$this->assign('data',$data);
	    		$this->assign('udata',$udata);
	    		$this->display();
	    	}


	}