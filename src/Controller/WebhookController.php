<?php

declare(strict_types=1);


namespace App\Controller;


use Sentry\FlushableClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class WebhookController extends AbstractController
{
    public function instagram(Request $request, FlushableClientInterface $sentry): Response
    {
        if ($request->isMethod('POST')) {
            $sentry->captureMessage( $request->getContent());
            return new Response('OK');
        }

        $challenge = $request->get('hub_challenge');
        $verifyToken = $request->get('hub_verify_token');

        return new Response($challenge);
    }
}