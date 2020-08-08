<?php
/* Здесь проверяется существование переменных */
if (isset($_POST['name'])) {$phone = $_POST['name'];}
if (isset($_POST['phone'])) {$name = $_POST['phone'];}
if (isset($_POST['message'])) {$message = $_POST['message'];}
 
/* Сюда впишите свою эл. почту */
$myaddres  = "koganaleksey@mail.ru"; // кому отправляем
 
/* А здесь прописывается текст сообщения, \n - перенос строки */
$mes = "Новое письмо с вебсайта hiltm.com \nИмя: $phone\nEmail: $name\nСообщение: $message";
 
/* А эта функция как раз занимается отправкой письма на указанный вами email */
$sub='Новое письмо'; //сабж
$email='письмо с вебсайта hiltm.com'; // от кого
$send = mail ($myaddres,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");
 
ini_set('short_open_tag', 'On');
header('Refresh: 3; URL=index.html');

?>
<!-- <!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="3; url=index.html">
<title>Спасибо! Ваще письмо отправлено!</title>
<meta name="generator">
<script type="text/javascript">
setTimeout('location.replace("/index.html")', 3000);
/*Изменить текущий адрес страницы через 3 секунды (3000 миллисекунд)*/
</script> 
</head>
<body>
<h1>Спасибо! Ваще письмо отправлено, в ближайшее время мы свяжемся с вами!</h1>
</body>
</html> -->