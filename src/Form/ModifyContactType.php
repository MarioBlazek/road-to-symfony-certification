<?php

declare(strict_types=1);

namespace App\Form;

use App\Application\Contact\ModifyContact;
use App\Domain\Contact\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ModifyContactType extends AbstractType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('submit', SubmitType::class, [
            'label' => 'Propose',
        ]);

        $builder->setDataMapper($this);
    }

    public function mapDataToForms($viewData, \Traversable $forms): void
    {
        if (!$viewData instanceof Contact) {
            return;
        }

        $forms = iterator_to_array($forms);

        $forms['firstName']->setData($viewData->getFirstName());
        $forms['lastName']->setData($viewData->getLastName());
        $forms['dateOfBirth']->setData($viewData->getDateOfBirth());
        $forms['address']->setData($viewData->getAddress());
        $forms['email']->setData($viewData->getEmail());
        $forms['phoneNumber']->setData($viewData->getPhoneNumber());
        $forms['notes']->setData($viewData->getNotes());
        $forms['organizationId']->setData($viewData->getOrganizationId());
    }

    public function mapFormsToData(\Traversable $forms, &$viewData): void
    {
        if (!$viewData instanceof Contact) {
            return;
        }

        $forms = iterator_to_array($forms);

        $viewData = new ModifyContact(
            $viewData->getId(),
            [
                Contact::FIELD_FIRST_NAME => $forms['firstName']->getData(),
                Contact::FIELD_LAST_NAME => $forms['lastName']->getData(),
                Contact::FIELD_DATE_OF_BIRTH => $forms['dateOfBirth']->getData(),
                Contact::FIELD_EMAIL => $forms['email']->getData(),
                Contact::FIELD_ADDRESS => $forms['address']->getData(),
                Contact::FIELD_PHONE_NUMBER => $forms['phoneNumber']->getData(),
                Contact::FIELD_NOTES => $forms['notes']->getData(),
                Contact::FIELD_ORGANIZATION_ID => $forms['organizationId']->getData(),
            ]
        );
    }

    public function getParent(): string
    {
        return GenericContactType::class;
    }
}
