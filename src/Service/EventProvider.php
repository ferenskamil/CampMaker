<?php

namespace App\Service;

use App\Entity\Event;
use App\Repository\EventRepository;
use App\Repository\OrganizerRepository;

class EventProvider
{
    public function __construct(
        private EventRepository $eventRepository,
        private OrganizerRepository $organizerRepository
    )
    {
    }

    public function getPreparedAllEvents(bool $shortenDescription = false) : array
    {
        $allEvents = $this->eventRepository->findAll();

        $events = [];
        foreach ($allEvents as $event) {
            $events[] = $this->prepareEvent($event, $shortenDescription);
        };

        return $events;
    }

    public function prepareEvent(Event $event, bool $shortenDescription = false) : array
    {
        $description = $event->getDescription();
        if ($shortenDescription) $description = substr($description, 0, 297) . "...";

        /** @var OrganizerRepository $organizerRepository*/
        $organizerId = $event->getOrganizer()->getId();
        $organizer = $this->organizerRepository->find($organizerId);

        return [
            'id' => $event->getId(),
            'title' => $event->getTitle(),
            'termFrom' => $event->getTermFrom()->format("Y-m-d"),
            'termTo' => $event->getTermTo()->format("Y-m-d"),
            'locality' => $event->getLocality(),
            'price' => $event->getPrice(),
            'description' => $description,
            'organizerName' => $organizer->getFullName()
        ];
    }
}