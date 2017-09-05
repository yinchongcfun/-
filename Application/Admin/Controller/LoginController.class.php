<?php

namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller
{
    //后台登录页
    public function login()
    {
        //判断session存在
        if (isset($_SESSION['name'])) {
            //已经登录则跳转至首页
            $this->redirect('Index/index');
        } else {
            $this->display();
            }

        }

    //验证登陆
    function checkLogin()
    {
        $post = I('post.');

            $model = M('admin');
            $data = $model->where($post)->find();

            if ($data) {
                session('userid', $data['id']);
                session('name', $data['username']);

                $this->redirect('Index/index');
            } else {
                $this->error('用户名或密码错误');
            }
    }


//退出登陆
    function exitLogin()
    {
        session(null);
        setcookie('auth', '', time() - 1);
        $this->redirect('Login/login');
    }

}