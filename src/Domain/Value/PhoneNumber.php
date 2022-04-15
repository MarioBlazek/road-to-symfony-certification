<?php

declare(strict_types=1);

namespace App\Domain\Value;

use JetBrains\PhpStorm\Pure;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class PhoneNumber
{
    private string $string;

    private function __construct(string $string)
    {
        $this->string = $string;
    }

    #[Pure] public static function fromString(string $string): static
    {
        return new static($string);
    }

    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context, $payload): void
    {
        if (!str_starts_with($this->string, '+385')) {
            $context->buildViolation('Phone number must start with +385')
                ->atPath('string')
                ->addViolation();
        }
    }

    public function toString(): string
    {
        return $this->string;
    }

    public function __toString(): string
    {
        return $this->string;
    }
}
