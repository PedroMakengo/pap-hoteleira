<?php 

include('assets/PHPMailer/src/Exception.php');
include('assets/PHPMailer/src/PHPMailer.php');
include('assets/PHPMailer/src/SMTP.php');

$emailUser = "pedromakengomiguel@gmail.com";

$email = new PHPMailer();
$email->isSMTP();
$email->Host = "smtp.gmail.com";
$email->SMTPAuth = "true";
$email->SMTPSecure = "tls";
$email->Port = "587";

$email->Username = "lusingamakiala940630782@gmail.com";
$email->Password = "Kiala12613@";

$email->isHTML(true);
$email->Subject = "Sistema de Gestão de Hoteis";
$email->setFrom("lusingamakiala940630782@gmail.com");
$email->Body = "
<h2>Sistema de recuperação de senha</h2>
<p>Testando o sistema</p>
";

$email->addAddress($emailUser); 

if($email->Send()){
  echo "<script>window.alert('Enviamos um email para si com a sua nova senha')</script>";
}else {
  echo "<script>window.alert('Email enviado não foi enviado')</script>";
}
$email->smtpClose();