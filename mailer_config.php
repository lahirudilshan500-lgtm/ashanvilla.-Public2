<?php
// Gmail SMTP configuration for Ashan Villa.
// Requires PHPMailer installed with Composer in this folder: composer require phpmailer/phpmailer

require_once dirname(__FILE__) . '/vendor/autoload.php';

function sendVillaEmail($subject, $body, $replyEmail, $replyName) {
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ashanvilla@gmail.com';
        $mail->Password = 'abcdefghiklmnopq';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        // Gmail requires the From address to be your authenticated Gmail address.
        $mail->setFrom('ashanvilla@gmail.com', 'Ashan Villa Website');
        $mail->addAddress('ashanvilla@gmail.com', 'Ashan Villa');

        if (filter_var($replyEmail, FILTER_VALIDATE_EMAIL)) {
            $mail->addReplyTo($replyEmail, $replyName);
        }

        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->send();
        return true;
    } catch (\Exception $e) {
        error_log('Ashan Villa email error: ' . $mail->ErrorInfo);
        return false;
    }
}
?>
