<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use Neighborhoods\Bradfab\Protean;
use Neighborhoods\Bradfab\TargetApplication\FactoryInterface;
use ReflectionClass;

class Bradfab implements BradfabInterface
{
    use Protean\Container\Builder\AwareTrait;

    public function run(): BradfabInterface
    {
        $this->getProteanContainerBuilder()->setCachedContainerFileName((new ReflectionClass($this))->getShortName());
        $this->getProteanContainerBuilder()->setCanBuildZendExpressive(false);
        $this->getProteanContainerBuilder()->setCanCacheContainer(false);
        $this->getProteanContainerBuilder()->registerServiceAsPublic(FabricatorInterface::class);
        $this->getProteanContainerBuilder()->registerServiceAsPublic(FactoryInterface::class);
        $container = $this->getProteanContainerBuilder()->build();
        $fabricator = $this->getProteanContainerBuilder()->build()->get(FabricatorInterface::class);
        $fabricator->setTargetApplication($container->get(FactoryInterface::class)->create());
        $fabricator->fabricate();

        return $this;
    }
}
