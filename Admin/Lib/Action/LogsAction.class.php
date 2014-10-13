<?php

class LogsAction extends PublicAction {
    function showLogs(){
       
        $logs = M('Logs');
        $ldata = $logs->select();

        $user = M('Users');
        $udata  = array();
        $food = M('Foods');
        $fdata  = array();

        foreach($ldata as &$row){
            $udata = $user->find($row['uid']);
            $fdata = $food->find($row['fid']);

            $row['user'] = $udata;
            $row['food'] = $fdata;
        }

        $this->assign('data',$ldata);
        $this->display();
    }

    function del(){
        $id = trim($_GET['id']);
        $logs = M('Logs');
        if($logs->delete($id)){
            $this->success('删除日志成功!');
        }else{
            $this->error('删除日志失败!');
        }
    }
    

}