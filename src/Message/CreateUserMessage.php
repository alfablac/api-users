<?php

namespace App\Message;

use Symfony\Component\Validator\Constraints as Assert;

final class CreateUserMessage
{
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

    /**
     * @Assert\Count(min="2")
     * @Assert\Valid()
     */
    private array $telephones;

    public function __construct(string $name, string $email, array $telephones)
    {
        $this->name = $name;
        $this->email = $email;
        $this->telephones = $telephones;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelephones(): array
    {
        return $this->telephones;
    }
}
