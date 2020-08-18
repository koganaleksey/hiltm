<?php

if (!empty($_POST['website'])) die();

$name = $_POST['name'];
$email_from = $_POST['email'];
$message = $_POST['message'];

$mail = array(
  'to' => "koganaleksey@mail.ru",
  'subject' => "Сообщение с сайта hiltm.com",
  'message' => "Имя: " . $name . "\n\n" . "Email: " . $email_from . "\n\n" . "Сообщение: " . "\r\n" . $message,
  'headers' => "MIME-Version: 1.0\r\n" . "Content-type: text/plain; charset=utf-8\r\n" . "From: <hiltm.com>\r\n"
);

mail($mail['to'], $mail['subject'], $mail['message'], iconv('utf-8', 'windows-1251', $mail['headers']));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="Content-Type: text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="refresh" content="6;URL=https://hiltm.com">

  <link rel="stylesheet" href="../assets/css/main.min.css">
</head>

<body>

  <div class="d-flex justify-content-center align-items-center text-center" style="width:100vw;height:100vh">
    <h3 style="width:400px;"><span class="font-weight-bold text-success">Спасибо, что связались с нами.</span><br><br><span class="font-weight-light">Мы свяжемся с вами в ближайшее время.<br>Теперь вы будете перенаправлены обратно на <a href="hiltm.com">hiltm.com.</a></span></h3>
  </div>

</body>

<?php
die();
?>