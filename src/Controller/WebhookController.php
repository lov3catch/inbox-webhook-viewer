<?php

declare(strict_types=1);


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class WebhookController extends AbstractController
{
    public function instagram(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            return new Response('OK');
        }

        $challenge = $request->get('hub_challenge');
        $verifyToken = $request->get('hub_verify_token');

        return new Response($challenge);
    }
}