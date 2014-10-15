<?php
	class IndexAction extends PublicAction {
	   	public function index(){
			
			$foods=M('Foods');
			$arr = $foods->select();
			$this->assign('data',$arr);

			$cdata = $this->_getBclass();
			$this->assign('cdata',$cdata);

			$udata = $this->_getUsers();
			$this->assign('udata',$udata);

			/*最新车辆*/
			$newfoods = $this->_getNewFoods();		
			$this->assign('newfoods',$newfoods);

			$logs = $this->_getLogs();
			$foods = M('Foods');

			foreach($logs as $k=>&$row){
				$fd = $foods->find($row['fid']);

				if($fd){
					$row['pic'] = $fd['pic'];
					$row['name'] = $fd['name'];
				}else{
					unset($logs[$k]);
				}				
			}
			
			$this->assign('logdata',$logs);

			/*所有车辆*/
			$foodsdata = $this->_getFoods(0,15);
			$this->assign('foodsdata',$foodsdata);

			$foodTotal = $foods->count('id');
			$this->assign('foodTotal',$foodTotal);	

			$fav = $this->_getNewFoods();	
			$this->assign('favdata',$fav);	

			$this->display();
		}
		
		//ajax获取二级分类
		function getSclass(){
			
			$where = array();
			$where['pid'] = array('eq',$_POST['id']);
			$sclass = M('Sclass');
			$sdata = $sclass->field('id,sname')->where($where)->order('orderno asc')->select();

			if(empty($sdata)){
				$this->ajaxReturn(0,"无二级分类",0);
			}else{
				$this->ajaxReturn($sdata,"有二级分类",1);
			}
		}

		//根据ID获取车辆信息
		function getFoodsById(){
			$where = array();
			$where['cid'] = array('eq',$_POST['cid']);			
			$foods = M('Foods');
			$fdata = $foods	->field('id,name,pic,price,describe')
						->where($where)
						->order('orderno asc')
						->select();

			if(empty($fdata)){
				$this->ajaxReturn(0,"没有车辆",0);
			}else{
				$this->ajaxReturn($fdata,"有车辆",1);
			}
		}


		/* 车辆搜索 */
		function searchFoods(){
			$fname = trim($_POST['fname']);
			$where = array();
			$where['name'] = array('like',"%".$fname."%");
			// $where['describe'] = array('like',"%".$fname."%");
			
			$foods = M('Foods');
			import('ORG.Util.Page');// 导入分页类
			$count = $foods->where($where)->count();// 查询满足要求的总记录数
			$Page = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
			$show = $Page->show();// 分页显示输出
			$data = $foods
					->where($where)
					->limit($Page->firstRow.','.$Page->listRows)
					->select();

			$this->assign('data', $data);
			$this->assign('page', $show);
			$this->display();
		}			

	}