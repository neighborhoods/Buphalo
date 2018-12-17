<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Rhift\Bradfab\Protean;
use Rhift\Bradfab\TargetApplication\FactoryInterface;

class Bradfab implements BradfabInterface
{
    use Protean\Container\Builder\AwareTrait;

    public function run(): BradfabInterface
    {
        $this->getProteanContainerBuilder()->setBuildZendExpressive(false);
        $this->getProteanContainerBuilder()->setCacheContainer(false);
        $this->getProteanContainerBuilder()->registerServiceAsPublic(FabricatorInterface::class);
        $this->getProteanContainerBuilder()->registerServiceAsPublic(FactoryInterface::class);
        $container = $this->getProteanContainerBuilder()->build();
        $fabricator = $this->getProteanContainerBuilder()->build()->get(FabricatorInterface::class);
        $fabricator->setTargetApplication($container->get(FactoryInterface::class)->create());
        $fabricator->fabricate();

        return $this;
    }
}
