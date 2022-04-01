<?php

declare(strict_types=1);

namespace App\Application\Contact;

use App\Domain\Contact\Contact;
use App\Domain\Contact\ContactRepository;

final class ContactCommandHandler
{
    private ContactRepository $repo;

    public function __construct(ContactRepository $repo)
    {
        $this->repo = $repo;
    }

    public function handleProposeContact(ProposeContact $command): void
    {
        $contact = Contact::propose($command->getContactId(), $command->getFieldValues());

        $this->repo->add($contact);
    }

    public function handleApproveContact(ApproveContact $command): void
    {
        $contact = $this->repo->get($command->getContactId());

        $contact->approve();

        $this->repo->flush();
    }

    public function handleRejectContact(RejectContact $command): void
    {
        $this->repo->delete($command->getContactId());
    }

    public function handleModifyContact(ModifyContact $command): void
    {
        $contact = $this->repo->get($command->getContactId());

        $contact->modify($command->getFieldValues());

        $this->repo->flush();
    }

    public function handleMergeContacts(MergeContacts $command): void
    {
        $targetContact = $this->repo->get($command->getTargetContactId());

        $targetContact->merge($command->getSourceContactId(), $command->getSourceFieldValues());

        $this->repo->delete($command->getSourceContactId());
        $this->repo->flush();
    }

    public function handleDeleteContact(DeleteContact $command): void
    {
        $this->repo->delete($command->getContactId());
    }
}
