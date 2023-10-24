<?php
$address = "info@arabianstarsoil.com";
if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$error = false;
$fields = array('name', 'email', 'message');

foreach ($fields as $field) {
    if (empty($_POST[$field]) || trim($_POST[$field]) == '') {
        $error = true;
    }
}

if (!$error) {
    $name = htmlspecialchars($_POST['name']);
    $email = trim($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $e_subject = 'You\'ve been contacted by ' . $name . '.';

    $e_body = "You have been contacted by: $name" . PHP_EOL . PHP_EOL;
    $e_reply = "E-mail: $email" . PHP_EOL . PHP_EOL;
    $e_content = "Message:\r\n$message" . PHP_EOL;

    $msg = wordwrap($e_body . $e_reply . $e_content, 70);

    $headers = "From: $email" . PHP_EOL;
    $headers .= "Reply-To: $email" . PHP_EOL;
    $headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;

    if (mail($address, $e_subject, $msg, $headers)) {
        echo 'Success';
    } else {
        echo 'ERROR!';
    }
}
?>
