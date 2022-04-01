<?php

declare(strict_types=1);

namespace App\Domain\Contact;

interface ContactRepository
{
    public function add(Contact $contact): void;
    public function get(ContactId $contactId): Contact;

    /**
     * @return array<Contact>
     */
    public function findProposed(): array;

    /**
     * @return array<Contact>
     */
    public function findApproved(): array;

    public function delete(ContactId $contactId): void;

    public function flush(): void;
}
