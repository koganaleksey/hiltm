<?php

if (isset($_POST['email'])) {
  $email_to = "koganaleksey@mail.ru";
  $email_subject = "Отправка формы на сайте";

  function died($error)
  {
    echo "Нам очень жаль, но в отправленной вами форме были обнаружены ошибки. ";
    echo $error . "<br /><br />";
    die();
  }

  if (!empty($_POST['website'])) die();

  if (
    !isset($_POST['name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['message'])
  ) {
    died('Сожалеем, но, похоже, возникла проблема с отправленной вами формой.');
  }

  $name = $_POST['name'];
  $email_from = $_POST['email'];
  $message = $_POST['message'];

  $error_message = "";
  if (strlen($error_message) > 0) {
    died($error_message);
  }
  $email_message = "Детали формы ниже.\n\n";

  function clean_string($string)
  {
    $bad = array("content-type", "bcc:", "to:", "cc:", "href");
    return str_replace($bad, "", $string);
  }

  $email_message .= "Имя: " . clean_string($name) . "\n\n";
  $email_message .= "Email: " . clean_string($email_from) . "\n\n";
  $email_message .= "Сообщение: " . clean_string($message);

  $headers = 'From: ' . $email_from . "\r\n" .
    'Reply-To: ' . $email_from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers);
?>

  <!DOCTYPE html>
  <html lang="ru">

  <head>
    <meta charset="utf-8">
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
}
die();
?>