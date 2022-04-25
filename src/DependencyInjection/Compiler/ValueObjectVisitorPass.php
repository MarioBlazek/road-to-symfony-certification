<?php

declare(strict_types=1);

namespace App\DependencyInjection\Compiler;

use App\Visitor\VisitorAggregate;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class ValueObjectVisitorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has(VisitorAggregate::class)) {
            return;
        }

        $definition = $container->findDefinition(VisitorAggregate::class);
        $taggedServices = $container->findTaggedServiceIds('app.value_object_visitor');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addVisitor', [new Reference($id)]);
        }
    }
}