<?php

namespace App\Controllers;

use App\Attributes\Post;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class SendEmail
{
    #[Post("/send-email")]
    public function sendEmail() : void
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        $email = (new Email())
            ->from("mahmud@superbnexus.com")
            ->to($_POST['email'])
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($_POST['subject'])
            ->text($_POST['message'])
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $dsn = "smtp://94fa8c61e50c10:cef02ca6ad9b9b@smtp.mailtrap.io:2525?encryption=tls&auth_mode=login";

        $transport = Transport::fromDsn($dsn);
        $mailer = new Mailer($transport);
        $mailer->send($email);
    }
}