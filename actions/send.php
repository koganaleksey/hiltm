<?php
require('actions/ErrorHandler.php');
require('actions/Validator.php');
require('actions/Session.php');

$errorHandler = new ErrorHandler;


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
				      } else {
                
                $to      = 'koganaleksey@mail.ru';
                $subject = $_POST['name'];
                $message = $_POST['message'];
                $headers = array(
                          'From' => $_POST['email'],
                          // 'Reply-To' => 'ikoganaleksey@yandex.ru',
                          );
    
                $mail = mail($to, $subject, $message, implode("\r\n", $headers));

                if($mail){
                  Session::flash('success', 'Сообщение успешно отправлено');
                  
                }

              }
}
?><script>alert("Sorry, Its Invalid");document.location="/";</script>