<?php

declare(strict_types=1);

namespace App\Visitor;

final class VisitorAggregate
{
    /**
     * @var ValueObjectVisitor[]
     */
    protected iterable $visitors;

    public function __construct(iterable $visitors = [])
    {
        $this->visitors = $visitors;
    }

    public function visit(object $valueObject): void
    {
        foreach ($this->visitors as $visitor) {
            if ($visitor->accept($valueObject)) {
                $visitor->visit($valueObject);
            }
        }
    }

    public function addVisitor(ValueObjectVisitor $visitor): void
    {
        $this->visitors[] = $visitor;
    }
}