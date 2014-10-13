<?php
	class PublicAction extends Action{
		function __construct(){
			header("content-type:text/html;charset=utf-8");
			$webData = $this->_getWebconfig();
			$this->assign('webData',$webData);
			$linkData = $this->_getFriendLinks();
			$this->assign('linkData',$linkData);
		}

		public function loginout(){			
			session(null);
				
			if(!empty($_COOKIE['uname'])){
				cookie('uname',null);
			}else if(!empty($_COOKIE['uheadpic'])){
				cookie('uheadpic',null);
			}else if(!empty($_COOKIE['ureceiving'])){
				cookie('ureceiving',null);		
			}else if(!empty($_COOKIE['uhotel'])){
				cookie('uhotel',null);		
			}
			
			$this->redirect('Index/index');
		}

		protected function _getUsers($a=0,$b=6){
			$users = M('Users');

			return $users
					->field('id,username,headpic,money')
					->order('money desc')
					->limit($a,$b)
					->select();
		}

		/*获取优惠信息*/
		protected function _getFav($a=0,$b=5){
			$foods = M('Foods'); 
			$t = time();
			$where = array();
			$where['price'] = array('NEQ','yprice');
			$where['start_time'] = array('LT',$t);
			$where['end_time'] = array('GT',$t);
			$data = $foods->limit($a,$b)
			        		->where($where)
			        		->select();

			return $data;
		}

		/*获取小类信息*/
		protected function _getClass($bnum = 8, $snum = 10){

			$bclass = M('Bclass');
			$bdata = $bclass->limit($bnum)->select();
			$sclass = M('Sclass');

			foreach($bdata as &$row){
				
				$sdata = $sclass
						->field('id,sname')
						->where("pid=".$row['id'])
						->order('orderno asc')
						->limit($snum)
						->select();
				$row['sdata']  = $sdata;
			}

			return $bdata;
		}

		/* 获取大分类 */
		protected function _getBclass($a=0,$b= 9){
			$bclass = M('Bclass');
			$bdata = $bclass->limit($a,$b)->select();
			return $bdata;
		}

		/* 获取点击量日志 */
		protected function _getLogs($a=0,$b=10){
			$log = M('Logs');

			$data =  $log
					->limit($a,$b)
					->group('fid')
					->select();

			foreach($data as &$row){
				$num = $log->where('fid='.$row['fid'])->sum('number');
				$row['number'] = $num;
			}
			//对点击量排序

			return $this->array_sort($data,'number','desc');			
		}

		private function array_sort($arr,$keys,$type='asc'){

			 $keysvalue = $new_array = array(); 

			 foreach ($arr as $k=>$v){ 
			  	$keysvalue[$k] = $v[$keys]; 
			 }

			 if($type == 'asc'){ 
			  	asort($keysvalue); 
			 }else{ 
			  	arsort($keysvalue); 
			 }

			 reset($keysvalue);

			 foreach ($keysvalue as $k=>$v){ 
			  	$new_array[$k] = $arr[$k]; 
			 }

			 return $new_array;  
		} 

		/*获取车辆信息*/
		protected function _getFoods($a=0,$b=30){
			$foods = M('Foods');

			return $foods
					->limit($a,$b)
					->select();
		}

		/*获取新的车辆信息*/
		protected function _getNewFoods($a=0,$b=4){
			$foods = M('Foods');

			return $foods
					->limit($a,$b)
					->order('regtime desc')
					->select();
		}

		/*用来判断用户是否登录*/
		protected function _gotoIndexPage(){
			$uid = session('uid');

			if(empty($uid)){				
				$this->redirect('Login/login/');exit;				
			}
		}

		/* 获取站点信息 */
		protected function _getWebconfig(){

			$web = M('Webconfig');

			return $web->find();
		}

		/* 获取友情链接 */
		protected function _getFriendLinks($step=8){
			$link = M('Friendlinks');
			
			return $link->order('orderno asc')->limit($step)->select();
		}


		/* 文件上传 */
		public function upload($path='',$thumb=false,$thumbMaxWidth=30,$thumbMaxHeight=30,$thumbRemoveOrigin=true){

			import('ORG.Net.UploadFile');

			$upload = new UploadFile();		// 实例化上传类
			$upload->maxSize  = 3145728 ;	// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
			$upload->savePath =  empty($path) ? "./Uploads/" : $path; // 设置附件上传目录
			$upload->thumb = $thumb;
			$upload->thumbPrefix = 'th_';
			$upload->thumbMaxWidth = $thumbMaxWidth; //缩略图的最大宽度，多个使用逗号分隔  
			$upload->thumbMaxHeight = $thumbMaxHeight; //缩略图的最大高度，多个使用逗号分隔 
			$upload->thumbRemoveOrigin = $thumbRemoveOrigin;//生成缩略图后是否删除原图 
			$upload->thumbPath = empty($path) ? "./Uploads/thumb/" : $path."\/thumb\/"; // 设置附件上传目录


			if(!$upload->upload()) {	// 上传错误提示错误信息

				return false;
			}else{				// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
			
			$savename = $info[0]['savename'];
			$upload->thumbFile = $savename;

			return $savename; // 保存上传的照片根据需要自行组装			
		}

		/*清除session中消息*/
		protected function clearuMsg(){
			session('uMsg',null);			
		}

		/*是否允许订车*/
		protected function userPass(){
			$upost = session('upost');

			if(1 != $upost){
				return false;
			}

			return true;	
		}

		/* 禁用IP用户不允许登录 */
		protected function loginPass(){
			$ip = M('Ip');
			$clientIp = get_client_ip();
			$clientIp = ip2long($clientIp);

			$where['start_IP'] = array('ELT',$clientIp);
			$where['end_IP'] = array('EGT',$clientIp);

			if($ip->where($where)->find()){
				
				return false;
			}

			return true;			
		}




	}