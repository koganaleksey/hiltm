<?php

if (!empty($_POST['website'])) die();

$name = $_POST['name'];
$email_from = $_POST['email'];
$message = $_POST['message'];
$success_message = '<div><h3>Спасибо, что связались с нами.</h3><p>Мы свяжемся с вами в ближайшее время.</p><p>Теперь вы будете перенаправлены обратно на hiltm.com</p></div>';

$mail = array(
  'to' => "koganaleksey@mail.ru",
  'subject' => "Сообщение с сайта hiltm.com",
  'message' => "Имя: " . $name . "\n\n" . "Email: " . $email_from . "\n\n" . "Сообщение: " . "\r\n" . $message,
  'headers' => "MIME-Version: 1.0\r\n" . "Content-type: text/plain; charset=utf-8\r\n" . "From: <hiltm.com>\r\n"
);

mail($mail['to'], $mail['subject'], $mail['message'], iconv('utf-8', 'windows-1251', $mail['headers']));

echo iconv('utf-8', 'windows-1251', $success_message);

?>

<meta http-equiv="refresh" content="6;URL=https://hiltm.com">
<!-- <link rel="stylesheet" href="../assets/css/main.min.css">
<div class="d-flex justify-content-center align-items-center text-center" style="width:100vw;height:100vh">
  <h3 style="width:400px;"><span class="font-weight-bold text-success">Спасибо, что связались с нами.</span><br><br><span class="font-weight-light">Мы свяжемся с вами в ближайшее время.<br>Теперь вы будете перенаправлены обратно на <a href="hiltm.com">hiltm.com.</a></span></h3>
</div> -->

<?php
die();
?>