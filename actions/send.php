<?php
if(isset($_POST['email'])) {
  $email_to = "koganaleksey@mail.ru";
  $email_subject = "website form submission";

  function died($error) {
    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
    echo "These errors appear below.<br /><br />";
    echo $error."<br /><br />";
    echo "Please go back and fix these errors.<br /><br />";
    die();
  }

  if(!empty($_POST['website'])) die();

  if (!isset($_POST['name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['message'])) {
    died('We are sorry, but there appears to be a problem with the form you submitted.');       
  }

  $name = $_POST['name'];
  $email_from = $_POST['email'];
  $message = $_POST['message'];

  $error_message = "";
  if(strlen($error_message) > 0) {
    died($error_message);
  }
  $email_message = "Form details below.\n\n";

  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  $email_message .= "Name: ".clean_string($name)."\n";
  $email_message .= "Email: ".clean_string($email_from)."\n";
  $email_message .= "Message: ".clean_string($message)."\n";

  $headers = 'From: '.$email_from."\r\n" .
             'Reply-To: '.$email_from."\r\n" .
             'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers);  
?>

<div class="d-flex justify-content-center align-items-center">
  <p style="width:400px">Thank you for contacting us. We will be in touch with you soon. You will now be redirected back to example.com.</p></div>
<META http-equiv="refresh" content="2;URL=http://hiltm.com">

<?php
}
die();
?>