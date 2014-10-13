<?php
class HelpAction extends PublicAction {
    public function help(){
	$this->display();
	$result=footer();
	$this->assign('lies',$result);
    }
}