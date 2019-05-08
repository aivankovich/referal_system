<?php
$to = 'il.moraru@yandex.ru';
$subject = 'Заявка Incarnet';
$message = 'Заявка от ' . $_POST['Email'];

$mail_headers = "MIME-Version: 1.0" . "\r\n" .
    "Content-type: text/html; charset=UTF-8" . "\r\n";

mail($to, $subject, $message, $mail_headers);

?>