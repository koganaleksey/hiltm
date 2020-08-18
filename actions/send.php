<?php

$name = $_POST['name'];
$email_from = $_POST['email'];
$message = $_POST['message'];

$mail = array(
  'to' => "koganaleksey@mail.ru",
  'subject' => "Сообщение с сайта hiltm.com",
  'message' => "Имя: " . $name . "\n\n" . "Email: " . $email_from . "\n\n" . "Сообщение: " . $message,
  'headers' => "MIME-Version: 1.0\r\n" . "Content-type: text/plain; charset=utf-8\r\n" . "From: <hiltm.com>\r\n"
);

mail($mail['to'], $mail['subject'], $mail['message'], iconv('utf-8', 'windows-1251', $mail['headers']));
