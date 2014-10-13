<?php
	/* 公共类 */
	class PublicAction extends Action {

		// protected $webCount = array();	//站点统计信息

		/* 构造方法，用于初始化一些操作:验证用户信息 */
		public function __construct(){
			// $mid = session('mid');
			// if(empty($mid)){
			// 	$this->display('Index:login');exit;
			// }
			header("content-type:text/html;charset=utf-8");
			$ip = M('Ip');
			$cip = ip2long(get_client_ip());

			$where['start_IP'] = array('ELT',$cip);
			$where['end_IP'] = array('EGT',$cip);

			if($ip->where($where)->find()){
				echo '<script>alert("您已被禁止登录，请联系管理员!");window.location.href="'.$_SERVER['root'].'/login_error";</script>';exit;
			}

			$webData = $this->_getWebconfig();
			$this->assign('webData',$webData);			
		}
		
		/* 获取站点信息 */
		protected function _getWebconfig(){

			$web = M('Webconfig');

			return $web->find();
		}		
		

		/* 验证用户身份权限 */
		private function checkRole(){
			
		}

		/* 判断用户登录 */
		public function isLogin(){

			return session('?name') && session('?uid');
		}

		
		/* 用户退出系统 */
	   	public function logout(){
			
			//设置用户状态退出系统
			$user = M("Admin");
			
			$udata = $user->field('id')->select();
			$id= '';

			foreach($udata as $row){
				if($row['id'] == session('mid')){
					$id = $row['id'];
					break;
				}
			}
			
			unset($udata);
			$user->save(array('id'=>$id,'status'=>3));

			//清除session&cookie
			session(null); // 清空当前的session
			$this->redirect('Index/index');
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

		/* 根据IP地址获取用户位置 */
		public function getUserLocaltion(){

			import('ORG.Net.IpLocation');	// 导入IpLocation类
			$client_ip = get_client_ip();		// 获取客户端的IP地址
			$Ip = new IpLocation('UTFWry.dat');	// 实例化类 参数表示IP地址库文件
			$area = $Ip->getlocation($client_ip); // 获取某个IP地址所在的位置

			return $area;
		}
		public static function date($name, $value = '', $isdatetime = 1, $loadjs = 0) {
			if($value == '0000-00-00 00:00:00') $value = '';
			$id = preg_match("/\[(.*)\]/", $name, $m) ? $m[1] : $name;
			if($isdatetime) {
				$size = 21;
				$format = '%Y-%m-%d %H:%M:%S';
				$showsTime = 12;
			} else {
				$size = 10;
				$format = '%Y-%m-%d';
				$showsTime = 'true';
			}
			$str = '';
				define('CALENDAR_INIT', 1);
				$str .= '<script src="__PUBLIC__/Js/jscal2.js"></script>
	   				 <script src="__PUBLIC__/Js/lang/cn.js"></script>
	   				 <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/jscal2.css" />
	    				<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/border-radius.css" />
	    				<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/steel/steel.css" />';
			$str .= '<input type="text" placeholder="填写内容不得为空...!" name="'.$name.'" id="'.$id.'" value="'.$value.'" class="date" readonly>&nbsp;';
			$str .= '<script type="text/javascript">
				Calendar.setup({
				weekNumbers: true,
			    inputField : "'.$id.'",
			    trigger    : "'.$id.'",
			    dateFormat: "'.$format.'",
			    showTime: '.$showsTime.',
			    minuteStep: 1,
			    onSelect   : function() {this.hide();}
				});
	        </script>';
			return $str;
		}
	}