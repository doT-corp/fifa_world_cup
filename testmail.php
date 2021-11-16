<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "guisamuel800@gmail.com";
    $to = "guisamuel53@gmail.com";
    $subject = "Teste PHP";
    $message = "Funcionou eeee";
    $headers = "From: ".$from;
    mail($to, $subject, $message, $headers);
    echo "O e-mail foi enviado.";
?>