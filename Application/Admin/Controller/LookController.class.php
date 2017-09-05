<?php

namespace Admin\Controller;

use Think\Controller;

//查看用户and查看试题(查看试题主要选择题型以及批次查看)
class LookController extends Controller
{
    //查看试题页面  选择批次  distinct 去重
    public function  showList()
    {
        $this->result=M('panduan')->field('pici')->distinct(true)->select();
      
        $this->display();

    }
    //查找 试题ajax
    public function  search()
    {
        if (IS_AJAX) {
            
            $radio = $_POST['radio'];
            $option = $_POST['option'];
            switch ($radio) {
                case 1:
                    $data = M('radio')->where('pici=' . $option)->select();
                    break;
                case 2:
                    $data = M('checkbox')->where('pici=' . $option)->select();
                    break;
                case 3:
                    $data = M('panduan')->where('pici=' . $option)->select();
                    break;
            }
            $this->ajaxReturn(json_encode($data));
        }
    }

//查看答题者
    public function  user_showList(){
        $this->data=M('user')->select();
        $this->display();
    }
    //重置答题者密码
    public  function  res(){
        if (IS_AJAX){
            $id=$_POST['id'];
            $data=M('user');
            $result = $data->where('id=' . $id)->setField('userpwd', '123456');
            if ($result){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }

        }
    }

}