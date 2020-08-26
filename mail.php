<?php
$name = $_GET['name'];
$email = $_GET['email'];
$subject = $_GET['subject'];
$message = $_GET['message'];


$to = "info@buildapp.co.za , shubham.designoweb@gmail.com";
$subject = "Message from Build App website";


$header = "From:" . $email. " \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$message = "Name: " . $name . "<br>" . "Email : " . $email . "<br>"  ."Subject: " . $subject. "<br>" . "Message: " .$message;

$retval = mail($to, $subject, $message, $header);


if ($retval == true) {
    
    $data="Message sent successfully...";
} else {
    $data="Message could not be sent...";
}
echo json_encode($data);
?>