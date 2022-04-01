<?php

declare(strict_types=1);

namespace App\Util;

final class ObjectArray
{
    public static function map($method, array $objects)
    {
        return array_map(
            static function ($object) use ($method) {
                return $object->$method();
            },
            $objects
        );
    }

    private function __construct()
    {
    }
}
