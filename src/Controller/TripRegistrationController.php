<?php

namespace App\Controller;

use App\Entity\TripRegistration;
use App\Form\TripRegistrationType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TripRegistrationController extends AbstractController
{
    #[Route('/zapisz-sie/{id}', name: 'trip_registration')]
    public function tripRegistartion(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        EventRepository $eventRepository
    ): Response {
        $tripRegistration = new TripRegistration();
        $event = $eventRepository->find($id);



        /** Handle form */
        $form = $this->createForm(TripRegistrationType::class, $tripRegistration);
        $form->handleRequest($request);

        /** If user submitted form */
        if ($form->isSubmitted() && $form->isValid()) {
            /** do right job */
            $form->getData();

            $newRegistration = $form->getData();
            $newRegistration->setEvent($event);
            $entityManager->persist($newRegistration);
            $entityManager->flush();

            return $this->redirectToRoute('events');
        }

        $params = [
            'form' => $form,
            'event' => $event
        ];
        return $this->render('trip_registration/index.html.twig', $params);
    }
}
