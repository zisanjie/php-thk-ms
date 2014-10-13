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
	    		$user = M('Users');			//实例化用户表
	    		$driver = M('Driver');		//实例化司机表

	    		$form_number = trim($_GET['form_number']);		//获取订单号

	    		if($form_number == session('uMsg')){			//
	    			session('uMsg',null);	    			
	    		}
	    		
	    		

	    		$where['form_number'] = array('EQ',$form_number);
	    		$data = $forms->where($where)->select();
	    		
	    		
	    		
	    		//测试方案1
	    	/*	mysql_connect("localhost:3306","root","binxu1992519");
	    		mysql_select_db("dcms1");
	    		mysql_set_charset("utf8");
	    		mysql_query("set names 'utf8'");		//连接数据库
	    		$sql="select * from dc_driver where (car_id=$data['fid']) ";
	    		$query=mysql_query($sql);
	    		$ddata=mysql_fetch_array($query);*/    //原生态php
	    		
	    		
	    		//测试方案2
	    		for ($i=0;$i<$data.length;$i++) {
	    			$some['car_id']=$data[i]['fid'];
	    		
	    		}
	    		$ddata = $driver->where($some)->select();
	    	
	    		
	    		
	    		$ud = $user->find($data[0]['uid']);
	    		$udata['id']	 =   $data[0]['uid'];	    		
	    		$udata['ftime']	 =   $data[0]['ftime'];
	    		//$udata['ask']	 =   $data[0]['ask'];
	    		//$udata['start']	 =   $data[0]['start'];
	    		$udata['end']	 =   $data[0]['end'];
	    		$udata['ytime']	 =   $data[0]['ytime'];
	    		$udata['form_number'] =   $data[0]['form_number'];
	    		$udata['status'] =   $data[0]['status'];
	    		$udata['username'] =   $ud['username'];
	    		$udata['truename'] =   $ud['truename'];
	    		$udata['address'] =   $ud['address'];
	    		$udata['phone'] =   $ud['phone'];
	    		//$udata['name'] = $ddata['name'];
	    		//$udata['driver_phone'] = $ddata['driver_phone'];	
	    		$sum = 0;				   		

	    		foreach($data as &$row){
	    			$fdata = $foods->find($row['fid']);
	    			
	    			//测试方案3
	    		//	$ddata = $driver->find($row['fid']);
	    		//	$row['drivername'] = $ddata['name'];
	    		
	    			$row['driver_phone'] = $ddata['driver_phone'];
	    			$row['foodname'] = $fdata['name'];
	    			$row['price'] = $fdata['price'];
	    			$row['yprice'] = $fdata['yprice'];
	    			$sum += $row['nprice'];
	    			unset($row['ftime']);
	    			unset($row['uid']);
	    			unset($row['ask']);
	    			unset($row['start']);
	    			unset($row['end']);
	    			unset($row['ytime']);
	    			unset($row['form_number']);
	    			unset($row['status']);
	    		}	
	    		
	    		
	    		
	    		//测试方案4
	 	 /*		foreach($data as &$row){
	    			$ddata = $driver->find($row['fid']);
	    			$row['drivername'] = $ddata['name'];
	    			$row['driver_phone'] = $ddata['driver_phone'];
	   		}*/

	    		
	    		
	    		$udata['sum'] =   $sum;	    
	    		$this->assign('some',$some);
	    		$this->assign('data',$data);
	    		$this->assign('udata',$udata);
	    		$this->assign('ddata',$ddata);
	    		$this->display();
	    	}


	}