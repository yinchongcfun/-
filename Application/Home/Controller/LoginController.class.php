<?php

namespace Home\Controller;

use Think\Controller;
use Think\Verify;

class LoginController extends Controller
{
    //登陆页面
    public function index()
    {
        //判断是否有cookie
        if (isset($_COOKIE['user_name'])) {
            //已经登录则跳转至首页
            $this->redirect('Login/welcome');
        } else {
            $this->display();
        }
    }
    
    //验证登陆
    public function checkLogin()
    {
        $post = I('post.');
        $result =M('user')->where($post)->find();
        //设定的考试批次
        if ($result) {
            cookie('user_id', $result['id'],3600*3);
            cookie('user_true',$result['usertruename'],3600*3);
            cookie('user_name', $result['username'],3600*3);
            $this->redirect('Login/welcome');
        } else {
            $this->error('用户名或密码错误');
        }
    }
    public  function welcome(){
        if (!$_COOKIE['user_id']){
            $this->redirect('Login/index');
        }
        $con_pici=M('config2')->field('pici')->find();
        $use_pici=M('allgrade')->where('userid='.$_COOKIE['user_id'].'  and pici='.$con_pici['pici'])->find();
        if (!$use_pici){
            session('use_pici','0');
        }else{
            session('use_pici','1');
        }
        $this->tim = M('config2')->field('timespan')->find();
        $this->display();
    }
    
//退出登陆
    public function exitLogin()
    {
        cookie(null,'user_');
        $this->redirect('Login/index');
    }
    public function pwd(){
     if (IS_POST){
         $id=$_POST['id'];
         $pwd=$_POST['password'];
         $result=M('user')->where("id=".$id)->setField('userpwd',$pwd);
         if ($result){
             $this->redirect('Login/index');
         }
         else{
               echo "<script>alert('操作失败')</script>";
         }
     }
    }



}