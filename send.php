<?php 
if(isset($_POST['submit'])){
    $to = "koganaleksey@mail.ru"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = "Отправка формы";
    $subject2 = "Копия Вашей отправки формы";
    $message = $name . " написал следующее:" . "\n\n" . $_POST['message'];
    $message2 = "Это копия Вашего сообщения " . $name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Письмо отправлено. Спасибо " name . ", мы свяжемся с Вами в ближайшее время.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>