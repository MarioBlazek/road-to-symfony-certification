<?php

namespace App\Repository\ORM\Type;

use App\Domain\Contact\ContactId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class ORMContactIdsType extends StringType
{
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $value = explode(',', parent::convertToPHPValue($value, $platform));

        return array_map([ContactId::class, 'fromString'], $value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $value = is_array($value) ? array_map('strval', $value) : [];

        return parent::convertToDatabaseValue(implode(',', $value), $platform);
    }

    public function getName()
    {
        return 'contact_ids';
    }
}
