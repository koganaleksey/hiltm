<?php

function send_mime_mail(
  $name_from = $_POST['name'], // имя отправителя
  $email_from = $_POST['email'], // email отправителя
  $name_to = 'Hiltm', // имя получателя
  $email_to = 'koganaleksey@mail.ru', // email получателя
  $data_charset = 'CP1251', // кодировка переданных данных
  $send_charset = 'KOI8-R', // кодировка письма
  $subject = 'Отправка письма с сайта hiltm.com', // тема письма
  $body = $_POST['message'], // текст письма
  $html = FALSE, // письмо в виде html или обычного текста
  $reply_to = FALSE
) {
  $to = mime_header_encode($name_to, $data_charset, $send_charset)
    . ' <' . $email_to . '>';
  $subject = mime_header_encode($subject, $data_charset, $send_charset);
  $from =  mime_header_encode($name_from, $data_charset, $send_charset)
    . ' <' . $email_from . '>';
  if ($data_charset != $send_charset) {
    $body = iconv($data_charset, $send_charset, $body);
  }
  $headers = "From: $from\r\n";
  $type = ($html) ? 'html' : 'plain';
  $headers .= "Content-type: text/$type; charset=$send_charset\r\n";
  $headers .= "Mime-Version: 1.0\r\n";
  if ($reply_to) {
    $headers .= "Reply-To: $reply_to";
  }
  return mail($to, $subject, $body, $headers);
}

function mime_header_encode($str, $data_charset, $send_charset)
{
  if ($data_charset != $send_charset) {
    $str = iconv($data_charset, $send_charset, $str);
  }
  return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
}

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

</html>

<?php
die();
?>