<?php

declare(strict_types=1);

namespace App\Application\Contact;

use App\Domain\Contact\ContactId;

class MergeContacts
{
    private ContactId $sourceContactId;
    private array $sourceFieldValues;
    private ContactId $targetContactId;

    public function __construct(ContactId $sourceContactId, array $sourceFieldValues, ContactId $targetContactId)
    {
        $this->sourceContactId = $sourceContactId;
        $this->sourceFieldValues = $sourceFieldValues;
        $this->targetContactId = $targetContactId;
    }

    public function getSourceContactId(): ContactId
    {
        return $this->sourceContactId;
    }

    public function getSourceFieldValues(): array
    {
        return $this->sourceFieldValues;
    }

    public function getTargetContactId(): ContactId
    {
        return $this->targetContactId;
    }
}
