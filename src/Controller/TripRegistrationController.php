<?php

namespace App\Controller;

use App\Entity\TripRegistration;
use App\Form\TripRegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TripRegistrationController extends AbstractController
{
    #[Route('/zapisz-sie', name: 'trip_registration')]
    public function tripRegistartion(): Response
    {
        $tripRegistration = new TripRegistration();

        $form = $this->createForm(TripRegistrationType::class, $tripRegistration);

        $params = [
            'form' => $form
        ];

        return $this->render('trip_registration/index.html.twig', $params);
    }
}
