<?php

declare(strict_types=1);

namespace App\Domain\Value;

use JetBrains\PhpStorm\Pure;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class Email
{
    private string $string;

    #[Pure] public static function fromString(string $string): static
    {
        return new static($string);
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('string', new Assert\Email());
    }

    public function toString(): string
    {
        return $this->string;
    }

    public function __toString(): string
    {
        return $this->string;
    }

    private function __construct(string $string)
    {
        $this->string = (string) $string;
    }
}
