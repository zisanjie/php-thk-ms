<?php
	/* 购物车 */
	class CartsAction extends PublicAction{

		function __construct(){
			// $this->_getDB2Carts();
			parent::__construct();
			$this->_gotoIndexPage();
		}

		/* 设置用户添加到购物车的车辆 */
		function setCarts(){
			
			$carts = M('Carts');
			$where = array();				
			$in = array();		
			$in['uid'] = session('uid');

			if(!$in['uid']){
				$this->ajaxReturn('nologin' ,'添加失败',0);exit;
			}
			$in['fid'] = trim($_POST['id']);
			$where['uid'] = array('eq',$in['uid']);
			$where['fid'] = array('eq',$in['fid']);
			$res = $carts->where($where)->find();

			if(!empty($res)){
				$this->ajaxReturn('NO' ,'添加失败',0);exit;
			}
			
			$in['number'] = 1;
			if($carts->add($in)){				
				$this->ajaxReturn('YES' ,'添加成功',1);
			}else{
				$this->ajaxReturn('NO' ,'添加失败',0);exit;
			}
		}

		/* 从数据库读取购物车信息 */
		private function _getDB2Carts(){
			$where = array();
			$where['uid'] = session('uid');
			$carts = M('Carts');
			$data = $carts->where($where)->select();
			$foods = M('Foods');

			foreach($data as &$row){

				$fdata = $foods->field('name,price,yprice')->find($row['fid']);
				$price = empty($fdata['yprice'])?$fdata['price']:$fdata['yprice'];
				$row['total'] = $row['number'] * $price;
				$row['yprice'] = $fdata['yprice'];
				$row['price'] = $fdata['price'];
				$row['name'] = $fdata['name'];				
			}
			
			session('carts',$data);
		}

		//显示购物车信息
		public function showCarts(){

			$this->_getDB2Carts();			
			$this->display();
		}

		//删除购物车中的信息
		function delCarts(){
			$id = $_POST['id'];
			$DB_old = session('carts');
			$bool = true;
			$carts = M('Carts');

			// if(array_key_exists($id, $DB_old)){
			foreach($DB_old as $k=>$row){	
				unset($DB_old[$id]);
				unset($_SESSION['carts'][$id]);
				
				if($id == $row['id']){
					unset($row);
					unset($_SESSION['carts'][$k]);
					$bool = $carts->delete($id);
				}
				//删除数据库中的				
			}

			if($bool){
				$this->ajaxReturn('YES' ,'删除成功',1);
			}else{
				$this->ajaxReturn('NO' ,'删除失败',0);
			}
		}

	}