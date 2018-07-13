<?php
if(isset($_POST['email'])) {
 
    $email_to = "atkozie@gmail.com";
    $email_subject = "Message from Two9Design contact page entry form";
 
//    function died($error) {
//        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
//        echo "These errors appear below.<br /><br />";
//        echo $error."<br /><br />";
//        echo "Please go back and fix these errors.<br /><br />";
//        die();
//    }
 
//    if(!isset($_POST['first_name']) ||
//        !isset($_POST['email']) ||
//        !isset($_POST['message'])) {
//        died('We are sorry, but there appears to be a problem with the form you submitted.');       
//    }
 
    $name = $_POST['name'];
    $email_from = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $email_message = "Form entry details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Subject: ".clean_string($subject)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);  
    header('Location: http://www.two9design.com/thank-you');
    exit();

}//end if isset
?>