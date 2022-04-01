<?php

declare(strict_types=1);

namespace App\Form;

use App\Domain\Value\Email;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class EmailType extends AbstractType implements DataTransformerInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addModelTransformer($this);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'constraints' => new Assert\Email(),
        ]);
    }

    public function getParent(): string
    {
        return \Symfony\Component\Form\Extension\Core\Type\EmailType::class;
    }

    public function getBlockPrefix(): string
    {
        return 'custom_email';
    }

    public function transform($value): ?string
    {
        if (is_null($value)) {
            return null;
        }

        if ($value instanceof Email) {
            return $value->toString();
        }

        throw new TransformationFailedException();
    }

    public function reverseTransform($value): ?Email
    {
        if (is_null($value)) {
            return null;
        }

        if (is_string($value)) {
            return Email::fromString($value);
        }

        throw new TransformationFailedException();
    }
}
