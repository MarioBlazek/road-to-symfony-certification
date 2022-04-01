<?php

declare(strict_types=1);

namespace App\Repository;

use App\Domain\Organization\Organization;
use App\Domain\Organization\OrganizationId;
use App\Domain\Organization\OrganizationRepository;
use App\Exception\NoResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Persistence\ManagerRegistry;

class ORMOrganizationRepository extends ServiceEntityRepository implements OrganizationRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Organization::class);
    }

    public function add(Organization $organization): void
    {
        $this->_em->persist($organization);
        $this->_em->flush($organization);
    }

    public function get(OrganizationId $id): Organization
    {
        $entity = $this->find($id);

        if (null === $entity) {
            throw NoResult::forId((string) $id);
        }

        return $entity;
    }

    public function findAll(): array
    {
        return $this->findBy([]);
    }

    public function findNames(array $ids): array
    {
        $result = $this->createQueryBuilder('o')
            ->select('o.id, o.name')
            ->where('o.id IN (:ids)')
            ->setParameter('ids', $ids)
            ->getQuery()
            ->getArrayResult();

        $results = [];
        foreach($result as $item) {
            $results[] = [
                'id' => (string) $item['id'],
                'name' => $item['name'],
            ];
        }

        return $results;

//        return array_column($result, 'name', 'id');
    }

    public function delete(OrganizationId $id): void
    {
        $reference = $this->_em->getReference($this->getClassName(), $id);

        try {
            $this->_em->remove($reference);
            $this->_em->flush($reference);
        } catch (EntityNotFoundException $e) {
            $this->_em->detach($reference);
        }
    }

    public function flush(): void
    {
        $identityMap = $this->_em->getUnitOfWork()->getIdentityMap();

        if (isset($identityMap[$this->getClassName()])) {
            $this->_em->flush($identityMap[$this->getClassName()]);
        }
    }
}
