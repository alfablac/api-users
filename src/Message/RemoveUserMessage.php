<?php

namespace App\Message;
use Symfony\Component\Validator\Constraints as Assert;

final class RemoveUserMessage
{
    private int $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}
