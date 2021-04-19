<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';
function send_mail($dataSendMail)
{
    global $config;
    $configEmail = $config['email'];
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = $configEmail['smtp_host'];
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = $configEmail['SMTPSecure'];
        $mail->Port = $configEmail['smtp_port'];
        $mail->CharSet = $configEmail['charset'];
        $mail->Username = getInfoSystem()['user_email_send'];
        $mail->Password = getInfoSystem()['pass_email_send'];
        $mail->setFrom(getInfoSystem()['user_email_send'], getInfoSystem()['fullname_email_send']);
        $mail->addReplyTo(getInfoSystem()['user_email_send'], getInfoSystem()['fullname_email_send']);
        $mail->IsHTML(true);
        $mail->addAddress($dataSendMail['email'], $dataSendMail['fullname']);
        $mail->Subject = $dataSendMail['title'];
        $mail->Body = $dataSendMail['content'];
        $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }
}
