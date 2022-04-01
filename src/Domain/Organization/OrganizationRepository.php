<?php

declare(strict_types=1);

namespace App\Domain\Organization;

interface OrganizationRepository
{
    public function add(Organization $organization): void;

    public function get(OrganizationId $id): Organization;

    /**
     * @param OrganizationId[] $ids
     *
     * @return string[]
     */
    public function findNames(array $ids): array;

    public function findAll(): array;

    public function delete(OrganizationId $id): void;

    public function flush(): void;
}
