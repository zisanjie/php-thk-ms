<?php
	class SclassAction extends PublicAction{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$sclass=M('Sclass');
			$id=trim($_GET['id']);
			
			$sdata = $sclass->find($id);
			
			$pid = $sdata['pid'];			
			$arr = $sclass->where("pid=".$pid)->select();
			session('bclass',$arr);
			$this->assign('data',$arr);

			$foods = M('Foods');
			$where['cid'] = array('EQ',$id);
			$fdata = $foods->where($where)->select();			

			foreach($fdata as &$row){
				$sdata = $sclass->find($row['cid']);
				$row['sname'] = $sdata['sname'];
			}

			unset($sdata);			
			///////////////////////
			//得到浏览数量
			$logs = M('Logs');
			foreach($fdata as &$row){
				$sdata = $logs->where('fid='.$row['id'])->find();

				if(!$sdata){
					$row['number'] = 0;
				}else{
					$row['number'] = $sdata['number'];
				}
			}
			/////////////////////

			$this->assign('fdata',$fdata);					
			$this->display();
		}

		/* 新的车辆信息 */
		private function newFoods(){
			$sclass = M('Sclass');
			$data = $this->_getNewFoods(0,30);
			
			foreach($data as &$row){
				$sdata = $sclass->find($row['cid']);
				$row['sname'] = $sdata['sname'];
			}

			unset($sdata);
			//得到浏览数量
			$logs = M('Logs');
			foreach($data as &$row){
				$sdata = $logs->where('fid='.$row['id'])->find();

				if(!$sdata){
					$row['number'] = 0;
				}else{
					$row['number'] = $sdata['number'];
				}
			}
			
			return $data;
		}

		/* 所有的车辆信息 */
		private function all(){
			$sclass = M('Sclass');
			$data = $this->_getFoods(0,500);
			
			foreach($data as &$row){
				$sdata = $sclass->find($row['cid']);
				$row['sname'] = $sdata['sname'];
			}

			unset($sdata);
			//得到浏览数量
			$logs = M('Logs');
			foreach($data as &$row){
				$sdata = $logs->where('fid='.$row['id'])->find();

				if(!$sdata){
					$row['number'] = 0;
				}else{
					$row['number'] = $sdata['number'];
				}
			}
			
			return $data;
		}

		/* 受欢迎的车辆信息 */
		private function welcome(){
			
			$data = $this->_getLogs(0,200);

			//得到车辆信息
			$foods = M('Foods');
			foreach($data as $k=>&$row){
				$sdata = $foods->find($row['fid']);

				if(!$sdata){
					unset($data[$k]);
				}else{
					$row['id'] = $sdata['id'];
					$row['price'] = $sdata['price'];
					$row['pic'] = $sdata['pic'];
					$row['cid'] = $sdata['cid'];
					$row['name'] = $sdata['name'];
				}
				unset($row['fid']);
			}

			unset($sdata);

			//得到分类信息
			$sclass = M('Sclass');
			foreach($data as &$row){
				$sdata = $sclass->find($row['cid']);
				$row['sname'] = $sdata['sname'];
			}
			
			return $data;
		}


		/*根据条件获取车辆信息*/
		public function getFoods(){
			$opr = $_GET['opr'];
			$data = array();

			switch($opr){
				case 'new':
					$data = $this->newFoods();
					break;
				case 'welcome':
					$data = $this->welcome();
					break;
				case 'all':
					$data = $this->all();
					break;					
				default:
					break;
			}

			if(empty($data)){
				
				$data = $this->_getFoods(0,500);
			}

			$this->assign('fdata',$data);

			$bclass = session('bclass');

			if(!$bclass){
				$sclass=M('Sclass');				
				$sdata = $sclass->find();				
				$pid = $sdata['pid'];			
				$bclass = $sclass->where("pid=".$pid)->select();
				session('bclass',$bclass);
			}

			$this->assign('data',$bclass);			
			$this->display('index');
		}
	}
?>