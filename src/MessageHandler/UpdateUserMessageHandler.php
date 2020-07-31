<?php

namespace App\MessageHandler;

use App\Entity\User;
use App\Message\UpdateUserMessage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class UpdateUserMessageHandler implements MessageHandlerInterface
{
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function __invoke(UpdateUserMessage $message)
    {
        $id = $message->getId();
        $name = $message->getName();
        $email = $message->getEmail();

        $user = $this->manager->getRepository(User::class)->find($id);

        if (null === $user) {
            throw new \InvalidArgumentException('User with ID #' . $id . ' not found.');
        }

        $user->setName($name);
        $user->setEmail($email);

        /* persiste no banco */
        $this->manager->persist($user);
        $this->manager->flush();
    }
}
