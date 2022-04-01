<?php

declare(strict_types=1);

namespace App\Form;

use App\Domain\Value\PhoneNumber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class PhoneNumberType extends AbstractType implements DataTransformerInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addModelTransformer($this);
    }

    public function getParent(): string
    {
        return TextType::class;
    }

    public function transform($value): ?string
    {
        if (is_null($value)) {
            return null;
        }

        if ($value instanceof PhoneNumber) {
            return (string)$value;
        }

        throw new TransformationFailedException();
    }

    public function reverseTransform($value): ?PhoneNumber
    {
        if (is_null($value)) {
            return null;
        }

        if (is_string($value)) {
            return PhoneNumber::fromString($value);
        }

        throw new TransformationFailedException();
    }
}
