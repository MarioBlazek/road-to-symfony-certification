<?php

declare(strict_types=1);

namespace App\Validation;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

final class CityValidator extends ConstraintValidator
{
    private array $forbiddenCities = ['moscow', 'minsk'];

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof City) {
            throw new UnexpectedTypeException($constraint, City::class);
        }

        if (null === $value) {
            return;
        }

        if ('' === $value) {
            return;
        }

        if (!is_string($value)) {
            return;
        }

        if (in_array(strtolower($value), $this->forbiddenCities, true)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $this->formatValue($value))
                ->addViolation();
        }
    }
}