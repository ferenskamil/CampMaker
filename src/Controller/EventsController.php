<?php

namespace App\Controller;

use App\Repository\EventRepository;
use App\Service\EventProvider;
use App\Entity\Event;
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
        return JsonResponse::fromJsonString($eventsJson);
    }

    #[Route('/wydarzenia/{id}', name: 'event_preview')]
    public function eventPreview(
        int $id,
        EventProvider $eventProvider,
        EventRepository $eventRepository
    ) : Response {
        /** @var Event $event */
        $event = $eventRepository->find($id);

        /** Redirect if Event not found */
        if (!$event) return new Response("Nie znaleziono Wydarzenia!");

        /** Create params */
        $params = ['event' => $eventProvider->prepareEvent($event)];

        /** Render page */
        return $this->render('events/event_preview.html.twig', $params);
    }

    #[Route('/api/v1/wydarzenia/{id}', name: 'event_preview_api')]
    public function eventPreviewApi(
        int $id,
        EventProvider $eventProvider,
        EventRepository $eventRepository
    ) : Response {
        /** @var Event $event */
        $event = $eventRepository->find($id);

        /** Return 404 if Event not found */
        if (!$event) return new JsonResponse(status: 404);

        /** Return Json if Event found successfully */
        $jsonEvent = json_encode($eventProvider->prepareEvent($event), JSON_FORCE_OBJECT);
        return JsonResponse::fromJsonString($jsonEvent);

    }
}
