<?php

namespace App\Repository\ORM\Type;

use App\Domain\Value\PhoneNumber;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class ORMPhoneNumberType extends StringType
{
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $value = parent::convertToPHPValue($value, $platform);

        return $value ? PhoneNumber::fromString($value) : null;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $value = $value instanceof PhoneNumber ? $value->toString() : null;

        return parent::convertToDatabaseValue($value, $platform);
    }

    public function getName()
    {
        return 'phone_number';
    }
}
