<?php

declare(strict_types=1);

namespace App\Domain\Value;

use Symfony\Component\Validator\Constraints as Assert;
use App\Validation\City;

class Address
{
    #[
        Assert\NotBlank(groups: ['Default', 'address']),
        Assert\Length(min: 10, groups: ['Default', 'address'])
    ]
    private string $street;

    #[
        Assert\NotBlank(groups: ['Default', 'city']),
        Assert\Length(min: 5, groups: ['Default', 'city']),
        Assert\Length(max: 5, groups: ['Default', 'city'])
    ]
    private string $postalCode;

    #[
        Assert\NotBlank(groups: ['Default', 'city']),
        City(groups: ['Default', 'city']),
    ]
    private string $city;

    #[
        Assert\NotBlank(),
        Assert\Country()
    ]
    private string $countryCode;

    public function __construct(string $street, string $postalCode, string $city, string $countryCode)
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
