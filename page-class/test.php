<?php
session_start();
include 'page_class.php';
//mysql_query("set names ");


?>	

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
 .highlight{
	background:#E8F4FF;
}
body {
	margin-top: 5px;
}
.STYLE2 {
	color: #FF0000;
	font-size: 12px;
}

-->
</style>

</head>
<body>

<table width="900" border="1" align="center"  cellpadding="10" cellspacing="0" bordercolor="#d3e9f3" >
    <tr>
      <td colspan="8" height="10" align="center" bgcolor="#D3E9F3">订单信息</td>
    </tr>
    <tr>
    <td align="center">序号</td>
    <td align="center">订单号</td>
    <td align="center">订货人</td>
    <td align="center">金额总计</td>
    <td align="center">付款方式</td>
    <td align="center">收货方式</td>
    <td align="center">订单状态</td>
    <td align="center">操作</td>
    </tr>
    <?php 
       if($_POST['sub']){
       	$pages=1;    //page当前页数
       }else{
       	$pages=$_GET['get_page'];
       }
       if($pages==""){
       	$pages=1;
       }
       $pagesize=10;   //每页显示数量	
       $count='';     //总记录数
       if(is_numeric($pages)){
       
	               	   
           $s1="select count(*) from tb_orders";
           $db->query($s1) or $db->show_error();
           $count=$db->fetch_row();
           $totalpages=ceil($count[0]/$pagesize);  //总页数
           $offset=($pages-1)*$pagesize;
           $sql="select * from tb_orders order by id desc limit $offset,$pagesize";
           $db->query($sql) or $db->show_error();
              
       
       if(!$count[0]){
       	echo "<tr><td align='center' colspan='7'height='40px'>暂时无任何数据！</td></tr>";
       }
       else {
       	$i=0;
       	while ($row=$db->fetch_row()){
       		$i+=1;
       		      		
       		echo "<tr onMouseOver=this.className='highlight' onMouseOut=this.className=''><td height='30px' align='center'>$i</td>";
       		echo "<td align='center'>$row[1]</td>";
       		echo "<td align='center'>$row[6]</td>";
       		echo "<td align='center'>$row[5]</td>";
       		echo "<td align='center'>$row[7]</td>";
       		echo "<td align='center'>$row[8]</td>";
       		echo "<td align='center'>$row[14]</td>";
       		echo "<td align='center'><a href=goods.php?fid=$row[0]>查看</a>/<a href=admin_del.php?fid=$row[0]&type=$row[1] onclick='return admin_del()'>删除</a></td>";
       		
        	}
       	
        }
       
       
    ?>
    <tr>
    <td align="center"  colspan="8" height="5px" bgcolor="#D3E9F3">
    <form action="" method="get" name="form">
    <?php 
    $page=new page(array('total'=>$count[0],'perpage'=>$pagesize));
    echo "总记录数：".$count[0]." &nbsp;总页数：".$totalpages ."&nbsp;&nbsp;". $page->show();
    }
    ?>
    
    </form>
      </td>
</tr></table>
            

</body>
</html>




