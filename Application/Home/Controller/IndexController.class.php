<?php
namespace Home\Controller;



class IndexController extends CommonController
{


    public function index()
    {
        header("Content-Type:text/html;charset=utf-8");
        /*       Select * From 表 order By rand() Limit 10*/
        $pici = M('config2')->field('pici')->find();
        $use_pici=M('allgrade')->where('userid='.$_COOKIE['user_id'].'  and pici='.$pici['pici'])->find();
        $manager_name = cookie('user_name');
        if (empty($manager_name)) {
            //未登陆重定向至管理员登陆页
            $this->redirect('Login/index');
        } else  if ($use_pici){
            $this->redirect('Login/welcome');
        }else{

            /*       Select * From 表 order By rand() Limit 10*/
            header("Content-Type:text/html;charset=utf-8");
            $pici = M('config2')->find();
            $a = M('config')->field('score,amount')->select();
            $this->radio = M('radio')->order('rand()')->where('pici='.$pici['pici'])->limit($a[0]['amount'])->select();
            $this->checkbox = M('checkbox')->order('rand()')->where('pici='.$pici['pici'])->limit($a[1]['amount'])->select();
            $this->panduan = M('panduan')->order('rand()')->where('pici='.$pici['pici'])->limit($a[2]['amount'])->select();
            $this->assign('config', $a);
            $this->assign('pici', $pici);
            $this->display();
        }


    }

    public function sub()
    {
        if (IS_POST) {
            $post = I('post.');
            $pici = $post['pici'];
            $userid = $post['userid'];

            unset($post['pici']);
            unset($post['userid']);

            $newarr = array_keys($post);
            $arr = array();
            foreach ($newarr as $k => $v) {
                $arr[$k]['shititype'] = strstr($v, '_', true);
                $arr[$k]['shitiid'] = substr(strstr($v, '_'), 1);
                switch ($arr[$k]['shititype']) {
                    case  1:
                        $arr[$k]['answer'] = $post[$arr[$k]['shititype'] . '_' . $arr[$k]['shitiid']];
                        break;
                    case  2 :
                        $arr[$k]['answer'] = implode(',', $post[$arr[$k]['shititype'] . '_' . $arr[$k]['shitiid']]);
                        break;
                    case  3:
                        $arr[$k]['answer'] = $post[$arr[$k]['shititype'] . '_' . $arr[$k]['shitiid']];
                        break;
                }

                $arr[$k]['pici'] = $pici;
                $arr[$k]['userid'] = $userid;
               
            }


            $cookie_id = cookie('user_id');
            $where = array('userid' => $cookie_id, 'pici' => $pici);

            M('usergrade')->where($where)->delete();

     /*      if ($b){
             echo 1;die;
       }else{               echo 0;die;
          }*/

            M('usergrade')->addAll($arr);

            $this->redirect('Index/succ');/*
            if ($result) {

            } else {
                header("Content-Type:text/html;charset=utf-8");
                echo "<script>alert('没有答题,请重新作答');</script>";
                echo "<script>window.history.back(-1); </script>";
            }*/
        }

    }

    public function succ()
    {
        //考试题的批次和时间
        $config2 = M('config2')->find();

        //三种类型的题的分数
        $radio_score = M('config')->where('tixingid=1')->field('score')->find();
        $check_score = M('config')->where('tixingid=2')->field('score')->find();
        $panduan_score = M('config')->where('tixingid=3')->field('score')->find();

        $grade = 0;
        $arr = array();
        $user_answer = M('usergrade')->where('pici=' . $config2['pici']."     and userid=".$_COOKIE['user_id'])->select();

        foreach ($user_answer as $k => $v) {
            switch ($v['shititype']) {
                case  1:
                    $a = M('radio')->field('answer')->where('id=' . $v['shitiid'])->find();
                    if ($v['answer'] == $a['answer']) {
                        $grade += $radio_score['score'];
                    }
                    break;
                case  2:
                    $a = M('checkbox')->field('answer')->where('id=' . $v['shitiid'])->find();
                    if ($v['answer'] == $a['answer']) {
                        $grade += $check_score['score'];
                    }
                    break;
                case  3:
                    $a = M('panduan')->field('answer')->where('id=' . $v['shitiid'])->find();
                    if ($v['answer'] == $a['answer']) {
                        $grade += $panduan_score['score'];
                    }
                    break;
            }

            $arr['userid'] = $v['userid'];
            $arr['usergrade'] = $grade;
            $arr['pici'] = $v['pici'];
         
     }

        $cookie_id = $_COOKIE['user_id'];

        $where = array('userid' => $cookie_id, 'pici' => $arr['pici']);
        M('allgrade')->where($where)->delete();
        M('allgrade')->where($where)->add();

        M('allgrade')->add($arr);
        $user_true = $_COOKIE['user_true'];
        $this->assign('user_true', $user_true);
        $this->assign('grade', $grade);

        if ($_COOKIE['user_true']) {
            $this->display();
        } else {

            $this->redirect('Login/index');
        }
    }
}