<?php
	class BclassAction extends PublicAction{

		// 分类浏览（分类列表）
		public function index(){
			
			$bclass=M('Bclass');
			$sclass = M('Sclass');
			
			$pid = trim($_GET['id']);
			$bdata = array();

			if(empty($pid)){
				$sdata = array();				
				//查询所有分类
				$bdata = $bclass
							->order('orderno asc')
							->select();

				foreach($bdata as &$row){
					$sdata = $sclass
								->where('pid='.$row['id'])
								->order('orderno asc')
								->select();
					$row['sclass'] = $sdata;
				}				
			}else{
				$bdata = $bclass->select($pid);				
				$bdata[0]['sclass'] = $sclass
								->where('pid='.$pid)
								->order('orderno asc')
								->select();
			}

			$this->assign('classData',$bdata);
			$this->display();
		}

		
	}