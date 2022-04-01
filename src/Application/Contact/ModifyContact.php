<?php

declare(strict_types=1);

namespace App\Application\Contact;

use App\Domain\Contact\ContactId;

class ModifyContact
{
    private ContactId  $contactId;
    private array $fieldValues;

    public function __construct(ContactId $contactId, array $fieldValues)
    {
        $this->contactId = $contactId;
        $this->fieldValues = $fieldValues;
    }

    public function getContactId(): ContactId
    {
        return $this->contactId;
    }

    public function getFieldValues(): array
    {
        return $this->fieldValues;
    }
}
