<?php
class FoodsAction extends PublicAction{
	public function details(){
				
		$id=trim($_GET['id']);
		$this->_setLogs($id);//写入日志信息
		//查询车辆列表
	           $foods = M('Foods');
	           $data = $foods->find($id);
	           $this->assign('data', $data);

	           //查询用户评价列表
	           $eval=M('Evaluate');
	           // 求出该车辆评价的平均值
	           $edata=$eval->where("fid='$id'")->avg('grade');
	       	$edata = (int)$edata;
		$this->assign('edata',$edata);
		$ED=$eval->where("fid='$id'")->order('lasttime desc')->select();

		
		foreach($ED as & $v){
			$edu = M('Users');
			$where['id'] = $v['uid'];
			$eduarr = $edu->where($where)->find();
			$v['username'] = $eduarr['username'];
			$v['posttime'] = date('Y-m-d H:i:s', $v['posttime']);

		}

		$footsid = trim($_GET['id']);

		$this->assign('footsid', $footsid);
		// dump($ED);exit;
		$this->assign('ed',$ED);
	           //得到用户评论  
	           $e=$eval->where("fid='$id'")->select();
	           //多表查询得到用户名
	           $user=M('Users');
	           foreach($e as &$row){
	           	$uid = $row['uid'];
	           	$row['user'] =$user->where("id='$uid'")->select();
	           }     
	           $this->assign('udata',$e);

	           $form = M('Forms');
	           $w['fid'] = array('eq',$id);
	           $f = $form->where($w)->group('form_number')->count('form_number');
	           $this->assign('f_num',$f);
		$this->display();
    }

    /* 记录用户浏览行为 
     * $fid 	[int]	车辆ID		
    */
    private function _setLogs($fid){
    	
    	$logs = M('Logs');
    	$uid = session('uid');
    	$set = array();
    	$set['date'] = time();
    	$set['uid'] = empty($uid) ? 0 : $uid; //uid 为0 的是游客,数据库默认为0

    	$ip = get_client_ip();
    	$ip = ip2long($ip);	//记录游客IP 
    	
	$res = $this->_isExist($fid, $ip, $set['uid']);

	if($res){
		//更新浏览次数    			
		$set['number'] = $res + 1;

		$where = array();
		$where['ip']	= array('EQ', $ip);
		$where['uid']	= array('EQ', $set['uid']);
		$where['fid'] = array('EQ', $fid);
		$where['_logic'] = 'and';

		$logs->where($where)->save($set);
	}else{
		//添加新记录
		$set['ip'] = $ip;		
		$set['fid'] = $fid;
		$res = $logs->add($set);
	}
    	
    }

    /* 判断用户是否存在,返回查询结果,用于记录日志是判断 */
    private function _isExist($fid, $ip, $uid){
    	$logs = M('Logs');
    	$where = array();

    	$where['fid'] = array('EQ', $fid);
    	$where['ip'] = array('EQ', $ip);
    	$where['uid'] = array('EQ', $uid);
    	
    	$result = $logs->field('number')->where($where)->find();

    	if(!empty($result)){
    		return $result['number'];
    	}else{
    		return false;
    	}
    }

    // evaluate对食物的评论
    public function evaluate(){

    	if(!session('?uid')){
    		$this->error('您还没有登录!',$_SERVER['root'].'/ms/index.php/Login/login');
    		exit;
    	}

            $f = M('Evaluate');
            $sh = $f->field('lasttime')->where('uid='.session('uid'))->order('lasttime desc')->find();

            if($sh['lasttime']+60>time()){
                    $this->error('评论不要太着急哦!');
                    exit;
            }

    	$_POST['posttime'] = time();
    	$_POST['lasttime'] = $_POST['posttime'];
    	$_POST['uid'] = session('uid');

    	$count = $f->add($_POST);

    	if($count){
    		$this->success('评论成功');
    	}else{
    		$this->error('评论失败');
    	}
    }

    // evaluate对食物的评论删除
    public function delEva(){

    	if(!session('?uid')){
    		$this->error('您还没有登录!',$_SERVER['root'].'/MS1.0/index.php/Login/login');
    		exit;
    	}

    	$id = $_POST['id'];
    	$f = M('Evaluate');
    	$count = $f->delete($id);

    	if($count){
    		$this->ajaxReturn('YES' ,'删除成功',1);
    	}else{
    		$this->ajaxReturn('NO' ,'删除失败',0);exit;
    	}
    }
}