<?php
require('./ErrorHandler.php');
require('./Validator.php');


if (!empty($_POST)) {
  $validator = new Validator($errorHandler);
  $validation = $validator->check($_POST, [
    'name' => [
      'required' => true,
      'maxlength' => 20,
      'minlength' => 3
    ],
    'email' => [
      'required' => true,
      'maxlength' => 20,
      'minlength' => 3,
      'email' => true
    ],
    'message' => [
      'required' => true,
      'minlength' => 6,
      'maxlength' => 900
    ]

  ]);

  if ($validator->fails()) {
    $errors = $validator->errors()->all();
    //header('Location: '. '../feedback.php');
  } else if (isset($_POST['email'])) {
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
    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
      $bad = array("content-type", "bcc:", "to:", "cc:", "href");
      return str_replace($bad, "", $string);
    }
  }

  $email_message .= "Имя: " . clean_string($name) . "\n";
  $email_message .= "Email: " . clean_string($email_from) . "\n";
  $email_message .= "Сообщение: " . clean_string($message) . "\n";

  $headers = 'From: ' . $email_from . "\r\n" .
    'Reply-To: ' . $email_from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers);
?>

  <div class="d-flex justify-content-center align-items-center" style="width:100wv;height:100vh">
    <p style="width:400px">Thank you for contacting us. We will be in touch with you soon. You will now be redirected back to example.com.</p>
  </div>
  <META http-equiv="refresh" content="2;URL=http://hiltm.com">



<?php
}
die();
?>