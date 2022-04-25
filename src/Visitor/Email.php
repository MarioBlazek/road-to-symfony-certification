<?php

declare(strict_types=1);

namespace App\Visitor;

use Psr\Log\LoggerInterface;

final class Email extends ValueObjectVisitor
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function accept(object $valueObject): bool
    {
        return $valueObject instanceof \App\Domain\Value\Email;
    }

    public function visit(object $valueObject): void
    {
        $this->logger->warning(sprintf("Visited %s value object.", get_class($valueObject)));
    }
}