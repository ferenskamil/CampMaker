<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantAppController extends AbstractController
{
    #[Route('/uczestnik', name: 'app_participant')]
    // #[Route('/uczestnik/{id}', name: 'app_participant')]
    // public function index(int $id): Response
    public function index(): Response
    {
        return $this->render('participant_app/index.html.twig', [
            'controller_name' => 'ParticipantAppController',
        ]);
    }
}
