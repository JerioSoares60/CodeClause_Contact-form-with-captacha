<?php


$captcha = $_POST["captcha"]; 
$secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";


$verify = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha), true);


$success = $verify["success"];

$name = stripslashes($_POST["name"]);
$email = stripslashes($_POST["email"]);
$subject = stripslashes($_POST["subject"]);
$message = stripslashes($_POST["message"]);

$headers = "From: example.com " . $email . "\r\n" .
    "Reply-To: soaresjerio@gmail.com" . $email . "\r\n" .
    "X-Mailer: PHP/" . phpversion();


$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";

$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

if ($success == false) {
 
  echo "Recaptcha Verification Failed";
} else if ($success == true) {
   
    if (mail("email@email.com", $subject, $Body, $headers)){
      //send successful
      echo "Recaptcha Success, Mail Sent Successfully";
    }else{
      //send failure
        echo "Mailing Failed";
      }
}

?>
