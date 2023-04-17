<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/back', name: 'back_admin')]
    public function back(): Response
    {
        return $this->render('admin/back.html.twig', [
            
        ]);
    }

    #[Route('/listUsers', name: 'app_admin_listUsers', methods: ['GET'])]
    public function listUsers(UserRepository $userRepository): Response
    {
        return $this->render('admin/listUsers.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

   

    #[Route('/ajouterUser', name: 'admin_ajouterUser')]
    public function ajouterUser(ManagerRegistry $doctrine , Request $request): Response
    {  
        $user = new User ();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {






            $m=$doctrine->getManager();

            $m->persist($user);
            $m->flush();
            return $this->redirectToRoute('app_admin_listUsers');
        }

        return $this->renderForm('admin/new.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form,
        ]);
    }

    /**
     * @Route("/detail-client/{id}", name="detail_client" )
     *
     * @return void
     */
    public function detail_client(User $user): Response
    {
        return $this->render('admin/detail-client.html.twig', [
            'user' => $user,
        ]);
    }

     

    #[Route('/supprimer-client/{id}', name: 'supprimer_client')]
    public function supprimer_client($id ,Request $request, UserRepository $userRepository, ManagerRegistry $doctrine): Response
    {   
        $user=$userRepository->find($id);
        $m=$doctrine->getManager();
        $m->remove($user);
        $m->flush();

            $this->addFlash('info', "la suppression se faite avec succès");
            
        

        return $this->redirectToRoute('app_admin_listUsers');
    }

    
}
