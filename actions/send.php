<?php 
$ToEmail = 'koganaleksey@mail.ru'; 
$EmailSubject = 'Сообщение из формы сайта'; 
$mailheader = "From: ".$_POST["email"]."\r\n"; 
$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$MESSAGE_BODY = "Name: ".$_POST["name"]."\n\n"; 
$MESSAGE_BODY .= "Email: ".$_POST["email"]."\n\n"; 
$MESSAGE_BODY .= "Message: ".nl2br($_POST["message"]).""; 
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure");
header('Location: index.html')
?>