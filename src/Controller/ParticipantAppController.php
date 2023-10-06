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

    // #[Route('/uczestnik/{id}/{eventId}', name: 'app_participant_event')]
    #[Route('/uczestnik/event', name: 'app_participant_event')]
    public function event() : Response
    {
        return $this->render('participant_app/event.html.twig');
    }

    // #[Route('/uczestnik/{id}/ustawienia', name: 'app_participant_settings')]
    #[Route('/uczestnik/ustawienia', name: 'app_participant_settings')]
    public function settings() : Response
    {
        return $this->render('participant_app/settings.html.twig');
    }
}
