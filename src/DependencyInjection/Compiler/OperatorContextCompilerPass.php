<?php

namespace App\DependencyInjection\Compiler;

use App\Service\Strategy\OperatorContext;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class OperatorContextCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $service = $container->findDefinition(OperatorContext::class);

        $strategyServiceIds = array_keys($container->findTaggedServiceIds('strategy'));

        foreach ($strategyServiceIds as $strategyServiceId) {
            $service->addMethodCall('addStrategy', [new Reference($strategyServiceId)]);
        }
    }
}