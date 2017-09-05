<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{

    //后台主页
    public function index()
    {
        $manager_name = session('name');
        if (empty($manager_name)) {
            //未登陆重定向至管理员登陆页
            $this->redirect('Login/login');
        } else {
            $this->display();
        }
    }
}