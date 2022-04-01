<?php

declare(strict_types=1);

namespace App\Domain\Contact;

use App\Domain\Organization\OrganizationId;
use App\Domain\Value\Address;
use App\Domain\Value\Email;
use App\Domain\Value\PhoneNumber;
use DateTimeInterface;
use InvalidArgumentException;

class Contact
{
    public const FIELD_FIRST_NAME = 'firstName';
    public const FIELD_LAST_NAME = 'lastName';
    public const FIELD_DATE_OF_BIRTH = 'dateOfBirth';
    public const FIELD_EMAIL = 'email';
    public const FIELD_ADDRESS = 'address';
    public const FIELD_PHONE_NUMBER = 'phoneNumber';
    public const FIELD_NOTES = 'notes';
    public const FIELD_ORGANIZATION_ID = 'organizationId';

    private ContactId $id;
    private bool $approved = false;

    /**
     * @var ContactId[]
     */
    private array $mergedIds = [];

    private OrganizationId $organizationId;
    private string $firstName;
    private string $lastName;
    private DateTimeInterface $dateOfBirth;
    private ?Email $email;
    private ?Address $address;
    private ?PhoneNumber $phoneNumber;
    private string $notes;

    public static function propose(ContactId $contactId, array $fieldValues): self
    {
        $contact = new self($contactId);
        $contact->modify($fieldValues);

        return $contact;
    }

    public function approve(): void
    {
        $this->approved = true;
    }

    public function modify(array $fieldValues): void
    {
        foreach ($fieldValues as $fieldName => $fieldValue) {
            $methodName = 'modify'.ucfirst($fieldName);

            if (!method_exists($this, $methodName)) {
                throw new InvalidArgumentException(sprintf(
                    'Cannot modify the field "%s".',
                    $fieldName
                ));
            }

            $this->$methodName($fieldValue);
        }
    }

    public function merge(ContactId $contactId, array $fieldValues): void
    {
        $this->modify($fieldValues);

        if (!in_array($contactId, $this->mergedIds, true)) {
            $this->mergedIds[] = $contactId;
        }
    }

    public function getId(): ContactId
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFullName(): string
    {
        return trim($this->firstName.' '.$this->lastName);
    }

    public function getDateOfBirth(): DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function getEmail(): ?Email
    {
        return $this->email;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function getPhoneNumber(): ?PhoneNumber
    {
        return $this->phoneNumber;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function getOrganizationId(): OrganizationId
    {
        return $this->organizationId;
    }

    private function __construct(ContactId $id)
    {
        $this->id = $id;
    }

    private function modifyFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    private function modifyLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    private function modifyDateOfBirth(?DateTimeInterface $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    private function modifyEmail(?Email $email): void
    {
        $this->email = $email;
    }

    private function modifyAddress(?Address $address): void
    {
        $this->address = $address;
    }

    private function modifyPhoneNumber(?PhoneNumber $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    private function modifyNotes(?string $notes): void
    {
        $this->notes = $notes;
    }

    private function modifyOrganizationId(?OrganizationId $organizationId): void
    {
        $this->organizationId = $organizationId;
    }
}
