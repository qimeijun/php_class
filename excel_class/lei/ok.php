<?php 
require 'php-excel.class.php';

$conn=mysql_connect(localhost,root,123456);
mysql_select_db("zhchsh") or die(mysql_error());
mysql_query("set names GB2312");

if (isset($_POST['sub'])){
	
//	if (isset($_POST['s_t']) && isset($_POST['l_t'])){
		

//		if ($start<$last){
//			
//			$sql="SELECT * FROM `list` where date_format(time,'%Y-%m-%d') between $start and $last";
//			
//		}elseif($start>$last){
//			
//			$sql="SELECT * FROM `list` where date_format(time,'%Y-%m-%d') between $start and $last";
//			
//		}else{
//			
//			$sql="SELECT * FROM `list` where date_format(time,'%Y-%m-%d')=$start";
//		}
//		
}
$sql="SELECT * FROM `list` where date_format(time,'%Y-%m-%d') between '".$_POST['s_t']."' and '".$_POST['l_t']."'";
$result=mysql_query($sql) or die(mysql_error());

//创建数组赋值
$data=array(
      1=>array('id','f_id','标题','作者','内容','时间'),
      );
      while ($row=mysql_fetch_row($result)){   //循环实现多维数组
      array_push($data,array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]));
      }
//print_r($data);
//echo $sql;
/*
$data = array(
        1 => array ('Name', 'Surname'),
        array('Schwarz', 'Oliver'),
        array('Test', 'Peter')
        );
*/
$xls = new Excel_XML('GB2312', false, 'My Test Sheet');  
$xls->addArray($data);
$xls->generateXML('my-test');

?>