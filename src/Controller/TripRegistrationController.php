<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TripRegistrationController extends AbstractController
{
    #[Route('/zapisz-sie', name: 'trip_registration')]
    public function tripRegistartion(): Response
    {
        $params = [];

        return $this->render('trip_registration/index.html.twig', $params);
    }
}
