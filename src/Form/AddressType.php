<?php

declare(strict_types=1);

namespace App\Form;

use App\Domain\Value\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;

class AddressType extends AbstractType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('street', TextType::class, [
            'required' => false,
        ]);

        $builder->add('postalCode', TextType::class, [
            'required' => false,
        ]);

        $builder->add('city', TextType::class, [
            'required' => false,
        ]);

        $builder->add('countryCode', CountryType::class, [
            'required' => false,
            'label' => 'Country',
        ]);

        $builder->setDataMapper($this);
    }

    public function mapDataToForms($viewData, \Traversable $forms): void
    {
        $forms = iterator_to_array($forms);

        if (!$viewData instanceof Address) {
            return;
        }

        $forms['street']->setData($viewData->getStreet());
        $forms['postalCode']->setData($viewData->getPostalCode());
        $forms['city']->setData($viewData->getCity());
        $forms['countryCode']->setData($viewData->getCountryCode());
    }

    public function mapFormsToData(\Traversable $forms, &$viewData): void
    {
        $forms = iterator_to_array($forms);

        $isEmpty = static function($empty, FormInterface $form) {
            return $empty && $form->isEmpty();
        };


        if(array_reduce($forms, $isEmpty, true)) {
            $viewData = null;

            return;
        }

        $viewData = new Address(
            $forms['street']->getData(),
            $forms['postalCode']->getData(),
            $forms['city']->getData(),
            $forms['countryCode']->getData()
        );
    }
}
