<?php

declare(strict_types=1);

namespace App\Domain\Value;

class Address
{
    private string $street;
    private string $postalCode;
    private string $city;
    private string $countryCode;

    public function __construct(string $street,string $postalCode,string $city,string $countryCode)
    {
        $this->street = $street;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->countryCode = $countryCode;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }
}
