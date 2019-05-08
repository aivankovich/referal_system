<?php
    $to = 'il.moraru@yandex.ru';
    $subject = 'Заявка с главной страницы Incarnet';
    $message = 'Заявка от ' . $_POST['Имя'] . ' телефон ' . $_POST['Телефон'] . ' почта ' . $_POST['Эл.почта'];

$mail_headers = "MIME-Version: 1.0" . "\r\n" .
    "Content-type: text/html; charset=UTF-8" . "\r\n";

mail($to, $subject, $message, $mail_headers);

?>