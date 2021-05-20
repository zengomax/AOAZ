<?php
    $to      = 'zengotita.jon@uni.eus';
    $subject = 'Test';
    $message = 'XD';
    $headers = 'From: erlete@gmail.com'       . "\r\n" .
                 'Reply-To: erlete@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
?>

