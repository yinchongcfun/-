<?php

namespace Home\Controller;

use Think\Controller;

class CommonController extends  Controller{
    protected  function  _initialize(){
        $userid=$_COOKIE['user_id'];
        if (!$userid){
            $this->redirect('Login/index');
        }else{
            //应该做的题的批次
            $pici=M('config2')->field('pici')->find();

            $use_pici=M('allgrade')->field('pici')->where('userid='.$userid)->select();
            $arr=array();
            foreach ($use_pici as $k=>$v){
                $arr[]=$v['pici'];
            }
            if (in_array($pici['pici'],$arr)){

                $this->redirect('Login/index');
            }
        }

    }

}