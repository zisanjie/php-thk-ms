<?php
// 用户评价
class EvaluateAction extends PublicAction {
    
    //显示用户评价信息
    function evaluateList(){
    	$ev = M('Evaluate');
    	$edata = $ev->select();

    	$user = M('Users');
    	$udata = array();
    	$food = M('Foods');
    	$fdata = array();

    	foreach($edata as &$row){

    		$udata = $user->field('username')->find($row['uid']);
    		$row['username'] = $udata['username'];
    		$fdata = $food->field('name')->find($row['fid']);
    		$row['foodname'] = $fdata['name'];
    	}

    	$this->assign('edata', $edata);
    	$this->display();
    }

    function del(){
    	$id = trim($_GET['id']);
    	$ev = M('Evaluate');
    	if($ev->delete($id)){
    		$this->success('删除评论成功!');
    	}else{
    		$this->error('删除评论失败!');
    	}

    }
    

}