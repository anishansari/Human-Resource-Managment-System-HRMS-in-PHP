<?php
	$to = "nitinchhabhaiya9@gmail.com";
	$subject = "Test";
	$msg = "Hello World yfujouylfgoulyg";
	$headers = 'Form: inaapps2016@gmail.com'. "\r\n".'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charset=utf-8';
	$sql = mail($to,$subject,$msg,$headers);
	echo $sql;
?>

<?php
require_once('user/mail/class.phpmailer.php');
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "inaapps2016@gmail.com.com";
$mail->Password = "inaapps2017";
$mail->SetFrom("nitinchhabhaiya9@gmail.com");
$mail->Subject = "Test";
$mail->Body = "hello nitin";
$mail->AddAddress("email@gmail.com");

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
 //$mail->SMTPSecure = 'tls';
?>







<?php 
$to = "nitin.chhabhaiya@yahoo.com";
$subject = "Test Name";
$message = "nitinchhabhaiya9";
$headers = 'Form: nitinchhabhaiya9@gmail.com'. "\r\n".'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charset=utf-8';

$mail=mail($to, "Subject:".$subject,$message,$headers );
if($mail){
  echo "Thank you for using our mail form";
}else{
  echo "Mail sending failed."; 
}
?>