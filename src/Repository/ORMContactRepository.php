<?php

declare(strict_types=1);

namespace App\Repository;

use App\Domain\Contact\Contact;
use App\Domain\Contact\ContactId;
use App\Domain\Contact\ContactRepository;
use App\Exception\NoResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Persistence\ManagerRegistry;

class ORMContactRepository extends ServiceEntityRepository implements ContactRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    public function flush(): void
    {
        $identityMap = $this->_em->getUnitOfWork()->getIdentityMap();

        if (isset($identityMap[$this->getClassName()])) {
            $this->_em->flush($identityMap[$this->getClassName()]);
        }
    }

    public function add(Contact $contact): void
    {
        $this->_em->persist($contact);
        $this->_em->flush($contact);
    }

    public function get(ContactId $contactId): Contact
    {
        $entity = $this->find($contactId);

        if (null === $entity) {
            throw NoResult::forId((string) $contactId);
        }

        return $entity;
    }

    public function findProposed(): array
    {
        return $this->findBy(['approved' => false]);
    }

    public function findApproved(): array
    {
        return $this->findBy(['approved' => true]);
    }

    public function delete(ContactId $contactId): void
    {
        $reference = $this->_em->getReference($this->getClassName(), $contactId);

        try {
            $this->_em->remove($reference);
            $this->_em->flush($reference);
        } catch (EntityNotFoundException $e) {
            $this->_em->detach($reference);
        }
    }
}
