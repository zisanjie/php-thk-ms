<?php
	/**
	 * 订单管理类
	 *
	 */
	class FormsAction extends PublicAction {
	    	
	    	/**
	    	 * 订单归集显示页面
	    	 *
	    	 */
	    	function listPage(){

	    		$forms = M('Forms');
	    		$data = $forms->group('form_number')->order('ftime desc')->select();
	    		$user = M('Users');
	    		$now = time();
	    		
	    		foreach($data as &$row){
	    			$uid = $row['uid'];
	    			$udata = $user->find($uid);
	    			$row['username'] = $udata['username'];
	    			$row['address'] = $udata['address'];

	    			if($now >= $row['ftime'] && 1 == $row['status']){
	    				$row['status'] = 3;
	    				//更新数据库
	    			}
	    		}

	    		
	    		$this->assign('data',$data);
	    		$this->display();	    		
	    	}


	    	/**
	    	 * 调用修改订单视图editPage.html
	    	 *
	    	 */
	    	function editPage(){
	    		$forms = M('Forms');
	    		$data = $forms->find($_GET['id']);
	    		$this->assign('data',$data);
	    		$this->display();
	    	}

	    	
	    	/**
	    	 * 接收新修改订单时的数据并对数据库操作
	    	 *
	    	 */
	    	function update(){
			$Forms = M("forms"); // 实例化User对象
			// 根据表单提交的POST数据创建数据对象
			$Forms->create();
			$Forms->add(); // 根据条件保存修改的数据
			$this->success('new_forms');
	    	}

	    	/**
	    	 * 接收删除订单时主键并对数据库操作
	    	 *
	    	 */
	    	function del(){
    			$form_number = trim($_GET['form_number']);
		        	$ip = M('Forms');
		        	$where['form_number'] = array('in',$form_number);

		       	 if($ip->where($where)->delete()){

		                $this->success('删除数据成功!');
		       	 }else{
		                $this->error('删除数据失败!');
		       	 }
	    	} 

	    	/* 订单详情 */
	    	function details(){
	    		$forms = M('Forms');
	    		$foods = M('Foods');
	    		$user = M('Users');
	    		$driver = M('Driver');
	    			
	    			
	    		$form_number = trim($_GET['form_number']);
	    		$where['form_number'] = array('EQ',$form_number);
	    		$data = $forms->where($where)->select();
	    		

	    		$ud = $user->find($data[0]['uid']);
	    		$udata['id']	 =   $data[0]['uid'];	    		
	    		$udata['ftime']	 =   $data[0]['ftime'];
	    		$udata['ask']	 =   $data[0]['ask'];
	    		$udata['form_number'] =   $data[0]['form_number'];
	    		$udata['status'] =   $data[0]['status'];
	    		$udata['start'] =	$data[0]['start'];
	    		$udata['end'] =	$data[0]['end'];
	    		$udata['ytime'] =	$data[0]['ytime'];
	    		$udata['username'] =   $ud['username'];
	    		$udata['truename'] =   $ud['truename'];
	    		$udata['address'] =   $ud['address'];
	    		$udata['phone'] =   $ud['phone'];
	    		$sum = 0;				    		

	    		foreach($data as &$row){
	    			$fdata = $foods->find($row['fid']);
	    			$ddata = $driver->find($row['id']);
	    			$row['drivername'] = $ddata['name'];
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

	    	//新订单
	    	function new_forms(){
	    		$forms = M('Forms');

	    		$t = time();
	    		$where = array();	    		
	    		$where['ftime'] = array('GT',$t);
	    		$where['status'] = array('eq',1); //未完成订单
	    		$data = $forms->where($where)->group('form_number')->select();

	    		$user = M('Users');

	    		foreach($data as &$row){
	    			$uid = $row['uid'];
	    			$udata = $user->find($uid);
	    			$row['username'] = $udata['username'];
	    			$row['address'] = $udata['address'];
	    		}

	    		$this->assign('data', $data);
	    		$this->display();
	    	}


	    
	}