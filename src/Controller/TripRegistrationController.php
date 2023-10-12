<?php

namespace App\Controller;

use App\Entity\TripRegistration;
use App\Form\TripRegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TripRegistrationController extends AbstractController
{
    #[Route('/zapisz-sie', name: 'trip_registration')]
    public function tripRegistartion(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $tripRegistration = new TripRegistration();

        $form = $this->createForm(TripRegistrationType::class, $tripRegistration);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();

            $newRegistration = $form->getData();
            $entityManager->persist($newRegistration);
            $entityManager->flush();

            return $this->redirectToRoute('events');
        }

        $params = [
            'form' => $form
        ];
        return $this->render('trip_registration/index.html.twig', $params);
    }
}
