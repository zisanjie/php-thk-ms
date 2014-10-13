<?php
class UsAction extends PublicAction{
	
    	public function us(){
		
		$this->display();
	}

	/*联系我们*/
	public function contact2Us(){
		$man = M('Admin');
	          	$data = $man
	          			->field('email,roles')
	          			->where(array('roles'=>array('not in', '0,1')))
	          			->order('roles asc')
	          			->select();        
	        	//查询用户权限
	         	$roles = M('roles');

	       	 foreach($data as &$row){
	            	$role = $roles->find($row['roles']);
	            	$row['roles'] = $role['name'];
	            	$row['describe'] = $role['describe'];
	        	}
	        
	        	$this->assign('adata',$data);
	        	$this->display();
	}
}