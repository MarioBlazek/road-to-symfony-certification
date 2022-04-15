<?php

declare(strict_types=1);

namespace App\Domain\Value;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\GroupSequence;
use Symfony\Component\Validator\GroupSequenceProviderInterface;

#[Assert\GroupSequenceProvider]
class User implements GroupSequenceProviderInterface
{
    #[
        Assert\NotBlank(groups: ['step2']),
    ]
    private string $firstName;

    #[
        Assert\NotBlank(groups: ['step2']),
    ]
    private string $lastName;

    #[
        Assert\NotBlank(groups: ['step1']),
        Assert\Length(min: 10, groups: ['step1']),
    ]
    private string $username;

    public function __construct(string $firstName, string $lastName, string $username)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getGroupSequence(): array|GroupSequence
    {
        return ['step1', 'step2'];
    }
}
