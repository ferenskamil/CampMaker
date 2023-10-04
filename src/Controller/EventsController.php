<?php

namespace App\Controller;

use App\Service\EventProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventsController extends AbstractController
{
    #[Route('/wydarzenia', name: 'events')]
    public function index(
        EventProvider $eventProvider
    ): Response {
        $events = $eventProvider->getPreparedAllEvents(shortenDescription: true);

        $params = [
            'events' => $events
        ];

        return $this->render('events/index.html.twig', $params);
    }

    #[Route('/api/v1/wydarzenia', name: 'events_api')]
    public function allEventsApi(
        EventProvider $eventProvider
    ) : JsonResponse {
        $events = $eventProvider->getPreparedAllEvents(shortenDescription: true);

        $eventsJson = json_encode($events, JSON_FORCE_OBJECT);

        $response = JsonResponse::fromJsonString($eventsJson);
        return $response;

    }
}
