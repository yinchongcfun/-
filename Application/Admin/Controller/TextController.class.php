<?php
 namespace Admin\Controller;
 use Think\Controller;
class TextController extends  Controller{
    //试题导入页面
    public function  text_show(){
        $this->display();
    }

//上传文件
   public  function file_upload() {

        if (!empty($_FILES)) {
            $config = array(
                'exts' => array('xlsx','xls'),
                'maxSize' => 3145728,
                'rootPath' =>'./Public',
                'savePath' => '/Uploads/',
                'subName' => array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);

            if (!$info = $upload->upload()) {
                $this->error($upload->getError());}
            vendor("PHPExcel.PHPExcel");
            vendor("PHPExcel.IOFactory");

            $file_name=$upload->rootPath.$info['photo']['savepath'].$info['photo']['savename'];
            $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));//判断导入表格后缀格式
       //上传题型的时候分为单选多选判断三种类型，用不同类型判断要上传的excel表的格式
           if($_POST['radio']==1){
            if ($extension == 'xlsx') {
                $objReader =\PHPExcel_IOFactory::createReader('Excel2007');
                $objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
            } else if ($extension == 'xls'){
                $objReader =\PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();//取得总行数
               //总列数留着备用
            $highestColumn =$sheet->getHighestColumn(); //取得总列数
               $pici = $objPHPExcel->getActiveSheet()->getCell("H2")->getValue();
               if (!$pici){
                   echo "<script>alert('请在表格中输入批次');</script>";
                  echo "<script>window.history.back(-1); </script>";

               }
               M('radio')->where('pici='.$pici)->delete();

               //A列是在表格中是序号，传入数据库的时候不用传A值  A在数据库里递增(id)
            for ($i = 2; $i <= $highestRow; $i++) {

                $data['title'] =$objPHPExcel->getActiveSheet()->getCell("B" .$i)->getValue();
                $data['op1'] =$objPHPExcel->getActiveSheet()->getCell("C" .$i)->getValue();
                $data['op2'] = $objPHPExcel->getActiveSheet()->getCell("D". $i)->getValue();
                $data['op3'] =$objPHPExcel->getActiveSheet()->getCell("E" .$i)->getValue();
                $data['op4'] =$objPHPExcel->getActiveSheet()->getCell("F" . $i)->getValue();
                $data['answer'] = $objPHPExcel->getActiveSheet()->getCell("G" . $i)->getValue();
                $data['pici'] = $objPHPExcel->getActiveSheet()->getCell("H" . $i)->getValue();
                M('radio')->add($data);
            }
            $this->success('导入成功!');
        }else if($_POST['radio']==2){

               if ($extension == 'xlsx') {
                   $objReader =\PHPExcel_IOFactory::createReader('Excel2007');
                   $objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
               } else if ($extension == 'xls'){
                   $objReader =\PHPExcel_IOFactory::createReader('Excel5');
                   $objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
               }

               $sheet = $objPHPExcel->getSheet(0);
               $highestRow = $sheet->getHighestRow();//取得总行数

               $highestColumn =$sheet->getHighestColumn(); //取得总列数
               $pici = $objPHPExcel->getActiveSheet()->getCell("J2")->getValue();
               if (!$pici){
                   echo "<script>alert('请在表格中输入批次');</script>";
                   echo "<script>window.history.back(-1); </script>";

               }
               M('checkbox')->where('pici='.$pici)->delete();
               for ($i = 2; $i <= $highestRow; $i++) {

                   $data['title'] =$objPHPExcel->getActiveSheet()->getCell("B" .$i)->getValue();
                   $data['op1'] =$objPHPExcel->getActiveSheet()->getCell("C" .$i)->getValue();
                   $data['op2'] = $objPHPExcel->getActiveSheet()->getCell("D". $i)->getValue();
                   $data['op3'] =$objPHPExcel->getActiveSheet()->getCell("E" .$i)->getValue();
                   $data['op4'] =$objPHPExcel->getActiveSheet()->getCell("F" . $i)->getValue();
                   $data['op5'] =$objPHPExcel->getActiveSheet()->getCell("G" . $i)->getValue();
                   $data['op6'] =$objPHPExcel->getActiveSheet()->getCell("H" . $i)->getValue();
                   $data['answer'] = $objPHPExcel->getActiveSheet()->getCell("I" . $i)->getValue();
                   $data['pici'] = $objPHPExcel->getActiveSheet()->getCell("J" . $i)->getValue();
                   M('checkbox')->add($data);
               }



               $this->success('导入成功!');
           }else if($_POST['radio']==3){

               if ($extension == 'xlsx') {
                   $objReader =\PHPExcel_IOFactory::createReader('Excel2007');
                   $objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
               } else if ($extension == 'xls'){
                   $objReader =\PHPExcel_IOFactory::createReader('Excel5');
                   $objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
               }

               $sheet = $objPHPExcel->getSheet(0);
               $highestRow = $sheet->getHighestRow();//取得总行数
               $highestColumn =$sheet->getHighestColumn(); //取得总列数
               $pici = $objPHPExcel->getActiveSheet()->getCell("D2")->getValue();
               if (!$pici){
                   echo "<script>alert('请在表格中输入批次');</script>";
                   echo "<script>window.history.back(-1); </script>";

               }
               M('panduan')->where('pici='.$pici)->delete();

               for ($i = 2; $i <= $highestRow; $i++) {
           
                   $data['title'] =$objPHPExcel->getActiveSheet()->getCell("B" .$i)->getValue();
                   $data['answer'] =$objPHPExcel->getActiveSheet()->getCell("C" .$i)->getValue();
                   $data['pici'] = $objPHPExcel->getActiveSheet()->getCell("D". $i)->getValue();
                   M('panduan')->add($data);
               }



               $this->success('导入成功!');
           }


        }
     else {
            $this->error("请选择上传的文件");
        }
    }
//导入用户页面
    public  function  user_show(){
        $this->display();
    }
     //用户上传方法
    public function  user_upload(){
        if (!empty($_FILES)) {
            $config = array(
                'exts' => array('xlsx','xls'),
                'maxSize' => 3145728,
                'rootPath' =>'./Public',
                'savePath' => '/Uploads/',
                'subName' => array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);
            if (!$info = $upload->upload()) {
                $this->error($upload->getError());}
            vendor("PHPExcel.PHPExcel");
            vendor("PHPExcel.IOFactory");

            $file_name=$upload->rootPath.$info['photo']['savepath'].$info['photo']['savename'];
            $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));//判断导入表格后缀格式


                if ($extension == 'xlsx') {

                    $objReader =\PHPExcel_IOFactory::createReader('Excel2007');
                    $objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
                } else if ($extension == 'xls'){
                    $objReader =\PHPExcel_IOFactory::createReader('Excel5');
                    $objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
                }

                $sheet = $objPHPExcel->getSheet(0);
                $highestRow = $sheet->getHighestRow();//取得总行数
                $highestColumn =$sheet->getHighestColumn(); //取得总列数
                for ($i = 2; $i <= $highestRow; $i++) {
                    $data['department'] =$objPHPExcel->getActiveSheet()->getCell("B" .$i)->getValue();
                    $data['usertruename'] =$objPHPExcel->getActiveSheet()->getCell("C" .$i)->getValue();
                    $data['username'] = $objPHPExcel->getActiveSheet()->getCell("D". $i)->getValue();
                if (!$objPHPExcel->getActiveSheet()->getCell("E" .$i)->getValue()){
                      $data['userpwd']='123456';
                  }else{
                    $data['userpwd'] =$objPHPExcel->getActiveSheet()->getCell("E" .$i)->getValue();}
                    M('user')->add($data);
                }
                $this->success('导入成功!');
        }
        else {
            $this->error("请选择上传的文件");
        }
    }








}