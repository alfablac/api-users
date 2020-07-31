<?php

namespace App\Controller;

use App\Message\UpdateUserMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class UpdateController extends AbstractController
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @Route("/users/{id}", methods={"PUT"})
     */
    public function updateAction(Request $request, int $id): Response
    {
        $requestContent = $request->getContent();

        $json = json_decode($requestContent, true);

        $this->bus->dispatch(new UpdateUserMessage($id, $json['name'], $json['email']));

        return new Response('', Response::HTTP_OK);
    }
}