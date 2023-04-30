<?php

namespace App\Service;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use App\Entity\ReponseReclamation;

class MailerService
{
    
    private $mailer;
    
    
    public function __construct( MailerInterface $mailer)
     {
        
        $this->mailer=$mailer;
     }
    
    public function sendEmail(string $to, ReponseReclamation $reponseReclamation): void
    {
        $email = (new Email())
            ->from('FREELANCI@gmail.com')
            ->to($to)
            ->subject('Réponse à votre réclamation')
            ->html($reponseReclamation->getContenueReponse());
            
        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            // Gérer l'erreur
        }
    }
   
}
?>