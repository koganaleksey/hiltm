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

  $email_message .= "Имя: " . clean_string($name) . "\n";
  $email_message .= "Email: " . clean_string($email_from) . "\n";
  $email_message .= "Сообщение: " . clean_string($message) . "\n";

  $headers = 'From: ' . $email_from . "\r\n" .
    'Reply-To: ' . $email_from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers);
  echo 'Благодарим Вас за обращение к нам.' . "\n" . 'Мы свяжемся с вами в ближайшее время.' . "\n" . 'Теперь вы будете перенаправлены обратно на hiltm.com.';
?>

  <!-- <div class="d-flex justify-content-center align-items-center text-center" style="width:100vw;height:100vh">
    <h2 class="ru" style="width:400px"><b>Благодарим Вас за обращение к нам.<b><br>Мы свяжемся с вами в ближайшее время. Теперь вы будете перенаправлены обратно на hiltm.com.</h2>
  </div> -->

  <META http-equiv="refresh" content="5;URL=https://hiltm.com">




<?php
}
die();
?>