<?php

declare(strict_types=1);

namespace App\Form;

use App\Application\Contact\ProposeContact;
use App\Domain\Contact\Contact;
use App\Domain\Contact\ContactId;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ProposeContactType extends AbstractType implements DataMapperInterface
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

    }

    public function mapFormsToData(\Traversable $forms, &$viewData): void
    {
        $forms = iterator_to_array($forms);

        $viewData = new ProposeContact(
            ContactId::generate(),
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
