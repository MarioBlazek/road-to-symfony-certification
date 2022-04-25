<?php

namespace App;

use App\DependencyInjection\Compiler\ValueObjectVisitorPass;
use App\Visitor\ValueObjectVisitor;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function build(ContainerBuilder $container): void
    {
//        $container->registerForAutoconfiguration(ValueObjectVisitor::class)
//            ->addTag('app.value_object_visitor');

        $container->addCompilerPass(new ValueObjectVisitorPass());
    }
}
