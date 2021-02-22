<?php

declare(strict_types=1);


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class WebhookController extends AbstractController
{
    /**
     * @Route("/instagram", name="instagram")
     */
    public function instagram(Request $request): Response
    {
        return new Response('OK');
    }
}