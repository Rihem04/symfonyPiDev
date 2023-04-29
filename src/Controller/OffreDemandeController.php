<?php

namespace App\Controller;


use App\Entity\OffreDemande;
use App\Entity\DemandeClient;
use App\Form\OffreDemandeType;
use App\service\MailerService;
use function PHPSTORM_META\map;
use App\Repository\OffreDemandeRepository;
use App\Repository\DemandeClientRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/offre/demande')]
class OffreDemandeController extends AbstractController
{
    #[Route('/', name: 'app_offre_demande_index', methods: ['GET'])]
    public function index(OffreDemandeRepository $offreDemandeRepository, DemandeClientRepository $demandeClientRepository): Response
    {
        return $this->render('offre_demande/index.html.twig', [
            'offre_demandes' => $offreDemandeRepository->findmesoffrede(1),
        ]);
    }
    #[Route('/affaire', name: 'app_offre_demande_affaire', methods: ['GET'])]
    public function mesaffaires(DemandeClientRepository $demandeClientRepository): Response
    {

        return $this->render('offre_demande/mes_affaires.html.twig', [
            'demande_clients' => $demandeClientRepository->findmesoffredetravail(1),
        ]);
    }
    /**************************************************tawa bech nreccuuperi les reponse mte3ii lkol w baaed 
     * f tableau mtaa l affichage naaml condition baaed el boucle for ken reponse="accepter " n7otha f div1
     * sinn n7otha f div lokhra 
     */

    #[Route('/{id}/reponse', name: 'app_offre_demande_repondre', methods: ['GET', 'POST'])]
    public function showmesdemandes(DemandeClient $demandeClient, OffreDemandeRepository $offreDemandeRepository, Request $request, DemandeClientRepository $demandeClientRepository): Response
    {

        $reponseOffre = new OffreDemande();
        $form = $this->createForm(OffreDemandeType::class, $reponseOffre);
        $form->handleRequest($request);
        //  $demande_id = $demandeClient->getId();
        $freelance_id = $demandeClient->getIdFreelance();
        if ($form->isSubmitted() && $form->isValid()) {
            $reponseOffre->setIdDemande($demandeClient);
            $reponseOffre->setIdFreelance($freelance_id);
            $demandeClient->setEtat("demande bien étudier ");
            $offreDemandeRepository->save($reponseOffre, true);
            $etat = $reponseOffre->getReponseDemande();
            $demandeClient->setEtat($etat);
            $demandeClientRepository->save($demandeClient, true);

            return $this->redirectToRoute('app_offre_demande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre_demande/new.html.twig', [
            'offre_demande' => $reponseOffre,
            'form' => $form,
        ]);
    }

    #[Route('/new', name: 'app_offre_demande_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DemandeClientRepository $demandeClientRepository, OffreDemandeRepository $offreDemandeRepository): Response
    {
        $offreDemande = new OffreDemande();
        $form = $this->createForm(OffreDemandeType::class, $offreDemande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offreDemandeRepository->save($offreDemande, true);

            return $this->redirectToRoute('app_demande_client_index', [], Response::HTTP_SEE_OTHER);


            //return $this->redirectToRoute('app_offre_demande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre_demande/new.html.twig', [
            'offre_demande' => $offreDemande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offre_demande_show', methods: ['GET'])]
    public function show(OffreDemande $offreDemande): Response
    {
        return $this->render('offre_demande/show.html.twig', [
            'offre_demande' => $offreDemande,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_offre_demande_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OffreDemande $offreDemande, OffreDemandeRepository $offreDemandeRepository): Response
    {
        $form = $this->createForm(OffreDemandeType::class, $offreDemande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offreDemandeRepository->save($offreDemande, true);

            return $this->redirectToRoute('app_offre_demande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre_demande/edit.html.twig', [
            'offre_demande' => $offreDemande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offre_demande_delete', methods: ['POST'])]
    public function delete(Request $request, OffreDemande $offreDemande, OffreDemandeRepository $offreDemandeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $offreDemande->getId(), $request->request->get('_token'))) {
            $offreDemandeRepository->remove($offreDemande, true);
        }

        return $this->redirectToRoute('app_offre_demande_index', [], Response::HTTP_SEE_OTHER);
    }
}
