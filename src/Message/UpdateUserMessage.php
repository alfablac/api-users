<?php

namespace App\Message;

use Symfony\Component\Validator\Constraints as Assert;

final class UpdateUserMessage
{
    /**
     * @Assert\NotBlank(message="ID is required.")
     */
    private int $id;

    /**
     * @Assert\NotBlank(message="Name is required.")
     * @Assert\Length(
     *     min="5",
     *     minMessage="Name must contain at least {{ limit }} chars.",
     *     max="10",
     *     maxMessage="Name must contain up to {{ limit }} chars."
     * )
     */
    private string $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private string $email;

    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
