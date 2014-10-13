<?php 
	function footer(){
		$Links=D("friendlinks");
		return $result=$Links->select();
	}

	function ucen($id){
		$User = M("users"); // 实例化User对象
		$condition['id'] = $id;
			// 把查询条件传入查询方法
		return $result=$User->where($condition)->select();
	}