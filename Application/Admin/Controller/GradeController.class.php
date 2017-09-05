<?php

namespace Admin\Controller;
use  Think\Controller;
class  GradeController extends  Controller{
    //导出成绩
    public  function  grade(){
        //导出成绩的批次随便找个试题类型导出，因为每个批次的题全都有不会少某个题型
        $this->result=M('panduan')->distinct(true)->field('pici')->select();
        $this->display();
    }

    //导出表格的方法
    public function  educe(){
        $data = M('allgrade')->
            join('tbuser on tballgrade.userid=tbuser.id')->
               field('userid,usertruename,username,usergrade,department')
               ->where('pici='.$_POST['pici'])->select();
        $count=count($data)+1;
        vendor("PHPExcel.PHPExcel");
        vendor("PHPExcel.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.PHPExcel.Worksheet.Drawing");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objActSheet = $objPHPExcel->getActiveSheet();

        // 水平居中（位置很重要，建议在最初始位置）
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:E'.$count)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objActSheet->getStyle("A1:E1")->getFont()->setName("微软雅黑")->setSize(16)->setBold(true);//设置单元格范围的字体、字体大小、加粗
        $objActSheet->getStyle("A2:IE".$count)->getFont()->setName("微软雅黑")->setSize(13);//设置单元格范围的字体、字体大小、加粗

        $objActSheet->setCellValue('A1', '序号');
        $objActSheet->setCellValue('B1', '用户姓名');
        $objActSheet->setCellValue('C1', '用户名');
        $objActSheet->setCellValue('E1', '部门');
        $objActSheet->setCellValue('D1', '总分');
        // 设置个表格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        // 垂直居中
        $objPHPExcel->getActiveSheet()->getStyle('A1:E'.$count)->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);

        // 设置页面边距为0.5厘米 (1英寸 = 2.54厘米)
        $margin = 1.78 / 2.54;   //phpexcel 中是按英寸来计算的,所以这里换算了一下
        $marginright = 1 / 2.54;   //phpexcel 中是按英寸来计算的,所以这里换算了一下
        //$pageMargins->setTop($margin);       //上边距
        //$pageMargins->setBottom($margin); //下
        $objPHPExcel->getActiveSheet()->getPageMargins()->setLeft($margin);      //左
        $objPHPExcel->getActiveSheet()->getPageMargins()->setRight($marginright);    //右

        //添加边框
        $objPHPExcel->getActiveSheet()->getStyle('A1:E'.$count)->getBorders()->getAllBorders()->setBorderStyle(\PHPExcel_Style_Border::BORDER_THIN );
        //导出格式
        foreach ($data as $k => $v) {
            $k += 2;
            $objActSheet->setCellValue('A' . $k, $v['userid']);
            $objActSheet->setCellValue('B' . $k, $v['usertruename']);
            $objActSheet->setCellValue('C' . $k, $v['username']);
            // 表格内容
            $objActSheet->setCellValue('D' . $k, $v['usergrade']);
            $objActSheet->setCellValue('E' . $k, $v['department']);
            // 表格高度
            $objActSheet->getRowDimension($k)->setRowHeight(40);
        }
        $fileName = '成绩表';
        $date = date("Y-m-d", time());
        $fileName .= "_{$date}.xls";
        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        // END
        exit;
    }

}