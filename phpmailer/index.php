<?php
require("class.phpmailer.php");


$mail = new PHPMailer();

$mail->IsSMTP();                   // 设置使用 SMTP
$mail->Host = "smtp.sina.com.cn";          // 指定的 SMTP 服务器地址
$mail->SMTPAuth = true;                // 设置为安全验证方式
$mail->Username = "lxtwanzcs@sina.com";             // SMTP 发邮件人的用户名
$mail->Password = "qq884168";             // SMTP 密码
$mail->CharSet = "gb2312";                   //解决邮件发送乱吗

$mail->From = "lxtwanzcs@sina.com";        //来自发件人
$mail->FromName = "腾讯";
$mail->AddAddress("timi@pof-dm.org");      //收件人地址
//$mail->AddAddress("terryxiahui@yahoo.com.cn","dalilng");
//$mail->AddAddress("xiahui@kaible.com","daling");  // 可选
//$mail->AddReplyTo("xiahui@kaible.com", "TERRY2");

$mail->WordWrap = 80;                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");     // 加附件
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");  // 附件，也可选加命名附件
$mail->IsHTML(true);                  // 设置邮件格式为 HTML

$mail->Subject = "请迅速给我回邮件,好么";     // 标题
$mail->Body  = '<B>恭喜你，成功注册为我们的VIP会员！</B>'; // 内容
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; // 附加内容

if(!$mail->Send())
{
  echo "Message could not be sent. <p>";
  echo "Mailer Error: " . $mail->ErrorInfo;
  exit;
}

echo "Message has been successfully sent！";

/*
 附：国内常用免费邮件POP3和SMTP设置
1.网易邮箱 POP3 和 SMTP 服务器地址设置：
邮箱 POP3 服务器（端口110） SMTP 服务器（端口25） 
@163.com pop3.163.com smtp.163.com 
@126.com pop3.126.com smtp.126.com 
@netease.com pop.netease.com smtp.netease.com 
@yeah.net pop.yeah.net smtp.yeah.net 
所有的SMTP服务器都需要身份验证。
2.Sina免费邮件服务器设置:
收信（pop3）服务器：pop3.sina.com.cn
发信（smtp）服务器：smtp.sina.com.cn
请选择smtp服务器要求身份验证选项
3.Yahoo中国免费邮件服务器设置：
接收邮件(POP3)服务器：pop.mail.yahoo.com.cn
发送邮件(SMTP)服务器：smtp.mail.yahoo.com.cn
Yahoo免费邮件服务器设置：（把你的资料填成国外的）
接收邮件(POP3)服务器：pop.mail.yahoo.com
发送邮件(SMTP)服务器：smtp.mail.yahoo.com
4.Gmail客户端：
POP服务器：pop.gmail.com
打开ssl端口995（注意，pop得默认端口是110，在这里要改成995）
SMTP服务器：smtp.gmail.com 
smtp服务器需要身份验证
开启ssl端口465或587
帐户名：你的gmail用户名（包括 [email=“@gmail.com]“@gmail.com[/email]”这部分）
Email地址：你完整的gmail地址([url=mailto:username@gmail.com]username@gmail.com[/url])
密码：你的gmail密码
5.中华网：　
pop.china.com
smtp.china.com
6.搜狐 
pop.sohu.com 
smtp.sohu.com
7.163电子邮局　
163.net
smtp.163.net 
8.263电子邮局　
263.net 
smtp.263.net
9.QQ邮箱
pop3服务器: pop.qq.com | smtp服务器: smtp.qq.com*/
?>

