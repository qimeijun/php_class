<?php
//连接数据库文件
$connect=mysql_connect("localhost","root","123456") or die("链接数据库失败！");
//连接数据库(test)
mysql_select_db("demo",$connect) or die (mysql_error());
mysql_query("set names GBK");

$temp=file("seo.csv");//连接EXCEL文件,格式为了.csv
for ($i=0;$i <count($temp);$i++)
{
$string=explode(",",$temp[$i]);//通过循环得到EXCEL文件中每行记录的值
//将EXCEL文件中每行记录的值插入到数据库中
$q="insert into test (title,content,author) values('$string[0]','$string[1]','$string[2]');";
mysql_query($q) or die (mysql_error());

if (!mysql_error());
{
echo " 成功导入数据!";
}
echo $string[2]."\n";
unset($string);
}

 

?>
