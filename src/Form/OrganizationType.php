<?php

declare(strict_types=1);

namespace App\Form;

use App\Domain\Organization\Organization;
use App\Domain\Organization\OrganizationId;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class OrganizationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('name', TextType::class, [
            'constraints' => [
                new Assert\NotBlank([
                    'message' => 'Organization name must not be blank.',
                ]),
                new Assert\Length([
                    'min' => 2,
                    'minMessage' => 'Organization name must be longer than 1 character.',
                ]),
            ],
        ]);

        $builder->add('phoneNumber', PhoneNumberType::class, [
            'required' => false,
        ]);

        $builder->add('email', EmailType::class, [
            'required' => false,
        ]);

        $builder->add('address', AddressType::class);

        $builder->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Organization::class,
            'empty_data' => function () {
                return new Organization(OrganizationId::generate());
            }
        ]);
    }
}
