<?php

$to = $_POST['email'];
$subject = "Från Den Glada Geten";

$headers = "From: glada.geten@kyh.se\r\n";
$headers .= "Reply-To: glada.geten@kyh.se\r\n";
$headers .= "Return-Path: glada.geten@kyh.se\r\n";
$headers .= "Content-type: text/html; charset=UTF-8";

$message = <<<EMAIL
Hej $firstname. " " .$lastname!

Du har nu bokat in dig hos oss.
Datum: $checkin till $checkout

Tack för din bokning!
EMAIL;

// Send mail
mail($to, $subject, $message, $headers);

?>
