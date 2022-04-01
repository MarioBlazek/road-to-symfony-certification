<?php

declare(strict_types=1);

namespace App\Domain\Organization;

use App\Domain\Value\Address;
use App\Domain\Value\Email;
use App\Domain\Value\PhoneNumber;

class Organization
{
    private OrganizationId $id;
    private string $name;
    private ?Email $email;
    private ?PhoneNumber $phoneNumber;
    private ?Address $address;

    public function __construct(OrganizationId $id)
    {
        $this->id = $id;
    }

    public function getId(): OrganizationId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): ?Email
    {
        return $this->email;
    }

    public function setEmail(?Email $email = null): void
    {
        $this->email = $email;
    }

    public function getPhoneNumber(): ?PhoneNumber
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?PhoneNumber $phoneNumber = null): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address = null): void
    {
        $this->address = $address;
    }
}
