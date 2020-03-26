<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email{

    private $mail = \stdClass::class;

    public function __construct($smtpDebug, $host, $user, $pass, $smtpSegure, $port, $setFromEmail, $setFromName)
    {
        $this->mail = new PHPMailer(true);
        //Server settings
        $this->mail->SMTPDebug = $smtpDebug;          // Enable verbose debug output
        $this->mail->isSMTP();                        // Send using SMTP
        $this->mail->Host = $host;                    // Set the SMTP server to send through
        $this->mail->SMTPAuth = true;                 // Enable SMTP authentication
        $this->mail->Username = $user;                // SMTP username
        $this->mail->Password = $pass;                // SMTP password
        $this->mail->SMTPSecure = $smtpSegure;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port = $port;
        $this->mail->CharSet = "utf-8";
        $this->mail->setLanguage("br");
        $this->mail->isHTML(true);
        $this->mail->setFrom($setFromEmail, $setFromName);
    }

    public function sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName){

        $this->mail->Subject = (string)$subject; // Titulo
        $this->mail->Body = $body; //Corpo do E-mail
        $this->mail->AddReplyTo($replyEmail, $replyName); //responder para : E-mail e Nome
        $this->mail->AddAddress($addressEmail, $addressName); //Destinatário: E-mail e nome

        try{

            $this->mail->Send();

        }catch(exception $e){

            echo "Error ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";

        }
    }
}