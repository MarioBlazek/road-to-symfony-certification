<?php

declare(strict_types=1);

namespace App\Application\Contact;

use App\Domain\Contact\ContactId;

final class RejectContact
{
    private ContactId $contactId;

    public function __construct(ContactId $contactId)
    {
        $this->contactId = $contactId;
    }

    public function getContactId(): ContactId
    {
        return $this->contactId;
    }
}
