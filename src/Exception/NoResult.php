<?php

declare(strict_types=1);

namespace App\Exception;

use Exception;
use JetBrains\PhpStorm\Pure;

class NoResult extends Exception
{
    #[Pure] public static function forId(string $id): self
    {
        return new static(sprintf(
            'The object with ID "%s" was not found.',
            $id
        ));
    }
}
