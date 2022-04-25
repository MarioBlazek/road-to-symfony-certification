<?php

declare(strict_types=1);

namespace App\Visitor;

abstract class ValueObjectVisitor
{
    abstract public function accept(object $valueObject): bool;

    abstract public function visit(object $valueObject): void;
}