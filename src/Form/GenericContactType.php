<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class GenericContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('firstName', TextType::class, [
            'required' => true,
            'constraints' => new Assert\NotNull(),
        ]);

        $builder->add('lastName', TextType::class, [
            'required' => true,
            'constraints' => new Assert\NotNull(),
        ]);

        $builder->add('dateOfBirth', BirthdayType::class, [
            'required' => false,
            'widget' => 'single_text',
//            'format' => 'd/M/y',
            'attr' => [
                'class' => 'bootstrap-datepicker',
            ],
        ]);

        $builder->add('email', EmailType::class, [
            'required' => false,
        ]);

        $builder->add('address', AddressType::class, [
            'required' => false,
        ]);

        $builder->add('phoneNumber', PhoneNumberType::class, [
            'required' => false,
        ]);

        $builder->add('notes', TextareaType::class, [
            'required' => false,
        ]);

        $builder->add('organizationId', OrganizationIdType::class, [
            'required' => false,
        ]);
    }
}
