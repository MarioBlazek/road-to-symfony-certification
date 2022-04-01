<?php

declare(strict_types=1);

namespace App\Util;

use JetBrains\PhpStorm\Pure;
use Symfony\Component\Uid\Uuid;

abstract class UuidId
{
    private string $string;

    #[Pure] public static function fromString(string $string): static
    {
        return new static($string);
    }

    public static function generate(): static
    {
        return static::fromString((string)Uuid::v4());
    }

    public function toString(): string
    {
        return $this->string;
    }

    public function __toString(): string
    {
        return $this->string;
    }

    private function __construct($string)
    {
        $this->string = (string) $string;
    }
}
