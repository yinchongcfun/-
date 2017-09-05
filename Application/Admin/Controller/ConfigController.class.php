<?php

namespace Admin\Controller;

use  Think\Controller;

class ConfigController extends Controller
{
    //设置页面
    public function config_index()
    {
        $this->result = M('config')->select();
        $this->display();
    }

//设置题型的考试数量以及分数
    public function sv()
    {
        if (IS_POST) {
            echo "<br/>";

//            dump($_POST);

            //键值键名转换  ['aaa']=>1  转换为[1]=>['aaa']
            foreach ($_POST as $k => $val) {
                foreach ($val as $key => $v) {
                    $tempArr[$key][$k] = $_POST[$k][$key];
                }
            }
//            dump($tempArr);

            //根据题型写typename
            foreach ($tempArr as $kk => $vv) {
                switch ($vv['tixingid']){
                    case 1;$vv['typename']='单项选择';
                        break;
                    case 2;$vv['typename']='多项选择';
                        break;
                    case 3:$vv['typename']='判断题';
                        break;
                }
                M('config')->where('tixingid=' . $vv['tixingid'])->save($vv);
            }
            $this->redirect("Config/config_index", '', 1, "添加成功");
        }

    }
//考试时间显示
    public function config_time()
    {
        $this->tm = M('config2')->field('timespan')->find();
        $this->display();
    }
//设置考试时间+批次
    public function tm()
    {
        M('config2')->save($_POST);
        $this->redirect("Config/config_time", '', 1, "添加成功");
    }
//批次显示
    public function config_pici()
    {
        $this->pc = M('config2')->field('pici')->find();
        $this->display();
    }
//设置批次 
    public function pc()
    {

        $a = M('config2')->where('id=1')->save($_POST);
        if ($a) {
            $this->redirect("Config/config_pici", '', 1, "添加成功");
        }


    }
}