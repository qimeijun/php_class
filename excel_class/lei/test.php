<?php
require 'php-excel.class.php';

$conn=mysql_connect(localhost,root,123456);
mysql_select_db("zhchsh") or die(mysql_error());
mysql_query("set names gbk");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>按日期导出数据excel表</title>
</head>
<body>
   <form id="form91" name="form91" method="post" action="ok.php"> 
   <table width="900" border="1"  height="40" align="center"> <tr>
      <td width="200" > 请选择要导出的起始时间:</td> 
       <td width="95">   <select name="s_t" id="s_t">     
      <?php
	  //date('Y-m-d',strtotime($row->addtime))  date('Y-m-d',strtotime(addtime))
         $sq0=mysql_query("select distinct(date_format(time,'%Y-%m-%d')) as st from  list order by id desc ");//绑定不重复记录
	     $b=mysql_fetch_object($sq0);
		 do
		  {
			  echo "<option value='$b->st'>$b->st</option><br/>";
		  }while($b=mysql_fetch_object($sq0)) ;
         ?>     
     </select>
    </td>     
    <td width="183" align="center"><font size="2">请输入要导出的截止时间：</font></td> 
       <td width="109"> <select name="l_t" id="l_t">       
       <?php
	  //date('Y-m-d',strtotime($row->addtime))  date('Y-m-d',strtotime(addtime))
         $sql0=mysql_query("select distinct(date_format(time,'%Y-%m-%d')) as lt from  list order by id desc ");//绑定不重复记录
	     $bb=mysql_fetch_object($sql0);
		  do
		  {
			  echo "<option value='$bb->lt'>$bb->lt</option><br/>";
		  }while($bb=mysql_fetch_object($sql0)) ;
         ?>          
     </select></td>
       <td width="181" align="right"><input name="sub" type="submit"  id="button" value="导出此时间范围记录到excel" /></td>
	   	   </tr>
   </table>  
 </form>
</body>
</html>

