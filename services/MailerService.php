<?php

namespace App\service;

use Symfony\Component\Mime\Email;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MailerService extends AbstractController
{
    public function sendEmail(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from('salim.bouazizi@esprit.tn')
            ->to('salim.bouazizi@esprit.tn')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');


        $mailer->send($email);
        $this->addFlash('success', "Veuillez vérifier votre boite mail, un email de verification a été envoyé !");
        // ...
    }
}
