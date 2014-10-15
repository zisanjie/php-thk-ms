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
			$start=trim($_POST['start']);
			$end=trim($_POST['end']);
			$ytime=trim($_POST['ytime']);
			$form_number=$_POST['form_number']='Dcms'.time().rand(0,22);
			session('ask',$ask);
			session('start',$start);
			session('end',$end);
			session('ytime',$ytime);
			session('form_number',$form_number);				
			$this->display();
		}

		//将表单信息写入数据库
		 public function finform(){
		 	$adata = session('forms');
		 	$carts = session('carts');		 	
		 	$ask = session('ask');
		 	$start = session('start');
		 	$end = session('end');
		 	$ytime = session('ytime');
		 	$form_number = session('form_number');
		 	$uid = session('uid');
		 	$fid = session('fid');
		 	$forms =M('Forms');
		 	$cart = M('Carts');
		 	
		 	$indata = array();
		 	$indata['form_number'] = $form_number;
			$indata['ask'] = $ask;
			$indata['ytime'] = $ytime;
			$indata['start'] = $start;
			$indata['end'] = $end;
			$indata['uid'] = $uid;
			$indata['ftime'] = time()+24*3600;
		 	$length = count($adata);		 	
		 	$flag = 0;	//是否全部生成订单标记
		 	
		 	if (session('?uheadpic')) {
		 		$user = M('Users');
			 	$where['username']= session('uname');
			 	$fdata =$user->where($where)->find();
		 	}
		 	elseif (session('?ureceiving')) {
		 		$user = M('Departments');
		 		$where['username']= session('uname');
		 		$fdata =$user->where($where)->find();
		 	}
		 	elseif (session('?uhotel')) {
		 		$user = M('Hotels');
		 		$where['username']= session('uname');
		 		$fdata =$user->where($where)->find();
		 	}
			 	
		 	
		 	
		 	
			for($i=0; $i<$length; $i++){
				$indata['fid'] = $adata[$i]['id'];	
				
				if ($fdata[money]>100 & $fdata[money]<=5000) {
					$indata['nprice'] = $adata[$i]['totals']*0.9;
				}
				elseif ($fdata[money]>5000 & $fdata[money]<=50000)	{
					$indata['nprice'] = $adata[$i]['totals']*0.8;
				}	
				elseif ($fdata[money]>50000)	{
					$indata['nprice'] = $adata[$i]['totals']*0.7;
				}
				else
				{ 	
				$indata['nprice'] = $adata[$i]['totals'];
				}
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
	    		$forms = M('Forms');		//实例化订单表
	    		$foods = M('Foods');		//实例化车辆表
	    		$driver = M('Driver');		//实例化司机表

	    		$form_number = trim($_GET['form_number']);		//获取订单号
	    		$where['form_number'] = $form_number;	//组装订单号条件
	    		$data = $forms->where($where)->select();		//查找订单记录

				foreach($data as $k => $v){							//遍历
					$some["id"] = $v["fid"];						//从订单表找出车号
					$foodsdata = $foods->where($some)->select();	//从车辆表查找对应车号记录
					$wheredata = array();
					$wheredata["driver_id"]=$foodsdata[0]["driver_id"];	//组装司机号条件
					$driverdata = $driver->where($wheredata)->select();	//从司机表查找对应司机号信息
					$data[$k]["name"] = $driverdata[0]["name"];
					$data[$k]["driver_phone"]=$driverdata[0]["driver_phone"];
				}
	    		
	    		foreach($data as &$row){
	    			$fdata = $foods->find($row['fid']);
	    			$row['carname'] = $fdata['name'];
	    			$row['price'] = $fdata['price'];
	    			$row['yprice'] = $fdata['yprice'];
	    			$sum += $row['nprice'];
	    		}	
	    		
	    		$udata['sum'] =   $sum;	    
	    		$this->assign('data',$data);
	    		$this->assign('udata',$udata);
	    		$this->display();
	    	}


	}