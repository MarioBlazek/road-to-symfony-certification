<?php

namespace App\Repository\ORM\Type;

use App\Domain\Organization\OrganizationId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class ORMOrganizationIdType extends StringType
{
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $value = parent::convertToPHPValue($value, $platform);

        return $value ? OrganizationId::fromString($value) : null;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $value = $value instanceof OrganizationId ? $value->toString() : null;

        return parent::convertToDatabaseValue($value, $platform);
    }

    public function getName()
    {
        return 'organization_id';
    }
}
