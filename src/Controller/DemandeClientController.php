<?php

namespace App\Controller;

use DateTime;
use App\Entity\User;
use Doctrine\ORM\Mapping\Id;
use App\Entity\DemandeClient;
use App\service\MailerService;
use App\Form\DemandeClientType;
use App\Repository\UserRepository;
use App\Repository\DemandeClientRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;

#[Route('/demande/client')]
class DemandeClientController extends AbstractController
{
    #[Route('/', name: 'app_demande_client_index', methods: ['GET'])]
    public function index(DemandeClientRepository $demandeClientRepository): Response
    {/* 
        return $this->render('demande_client/index.html.twig', [
            'demande_clients' => $demandeClientRepository->findAll(),
        ]); */

        return $this->render('demande_client/demande_dashboard.html.twig');
    }
    #[Route('/{id}/select', name: 'app_usershow', methods: ['GET', 'POST'])]
    public function showuser(User $user, Request $request, DemandeClientRepository $demandeClientRepository, UserRepository $userRepository): Response
    {

        $demandeClient = new DemandeClient();
        $form = $this->createForm(DemandeClientType::class, $demandeClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $now = new DateTime();
            $demandeClient->setEtat("non étudié");
            $demandeClient->setDateCreation($now);
            $demandeClient->setIdFreelance($user->getId());
            $demandeClientRepository->save($demandeClient, true);
            return $this->redirectToRoute('app_demande_show_mes_demandes', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande_client/new.html.twig', [
            'demande_client' => $demandeClient,
            'form' => $form,
            'users' => $user,
        ]);
    }
    #[Route('/show_mes_demande', name: 'app_demande_show_mes_demandes', methods: ['GET'])]
    public function showmesdemandes(DemandeClientRepository $demandeClientRepository): Response
    {
        return $this->render('demande_client/mes_demandes.html.twig', [
            'demande_clients' => $demandeClientRepository->findmesdemandes(1),
        ]);
    }

    #[Route('/show_all_demande', name: 'app_demande_show_all_demandes', methods: ['GET'])]
    public function showalldemandes(DemandeClientRepository $demandeClientRepository): Response
    {
        return $this->render('demande_client/index.html.twig', [
            'demande_clients' => $demandeClientRepository->findAll(),
        ]);
    }

    #[Route('/{id}/mesdemande', name: 'app_demande_client_showMyDemande', methods: ['GET'])]
    public function mesdemandes($id, DemandeClientRepository $demandeClientRepository): Response
    {
        return $this->render('demande_client/mes_demandes.html.twig', [
            'demande_clients' => $demandeClientRepository->findmesdemandes(1),
        ]);
    }


    #[Route('/home', name: 'app_demande_client_home', methods: ['GET'])]
    public function home(DemandeClientRepository $demandeClientRepository, UserRepository $userRepository): Response
    {
        return $this->render('demande_client/liste_user.html.twig', [
            'users' => $userRepository->findAll(),
        ],);
    }

    #[Route('/new', name: 'app_demande_client_new', methods: ['GET', 'POST'])]
    public function new(MailerService $mailerService, Request $request, DemandeClientRepository $demandeClientRepository, UserRepository $userRepository): Response
    {

        $demandeClient = new DemandeClient();
        $form = $this->createForm(DemandeClientType::class, $demandeClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $now = new DateTime();
            $demandeClient->setEtat("non étudié");
            $demandeClient->setDateCreation($now);
            $demandeClientRepository->save($demandeClient, true);
            $message = "le message de verification de l'email";
            $mail = new MailerInterface();
            $mailerService->sendEmail($mail);
            return $this->redirectToRoute('app_demande_client_showMyDemande', ["id" => 1], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande_client/new.html.twig', [
            'demande_client' => $demandeClient,
            'form' => $form,
            'users' => $userRepository->findAll(),
        ]);
    }


    #[Route('/{id}', name: 'app_demande_client_show', methods: ['GET'])]
    public function show(DemandeClient $demandeClient): Response
    {
        return $this->render('demande_client/show.html.twig', [
            'demande_client' => $demandeClient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_demande_client_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DemandeClient $demandeClient, DemandeClientRepository $demandeClientRepository): Response
    {
        $form = $this->createForm(DemandeClientType::class, $demandeClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandeClientRepository->save($demandeClient, true);

            return $this->redirectToRoute('app_demande_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande_client/edit.html.twig', [
            'demande_client' => $demandeClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_demande_client_delete', methods: ['POST'])]
    public function delete(Request $request, DemandeClient $demandeClient, DemandeClientRepository $demandeClientRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $demandeClient->getId(), $request->request->get('_token'))) {
            $demandeClientRepository->remove($demandeClient, true);
        }

        return $this->redirectToRoute('app_demande_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
