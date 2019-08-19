<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use Neighborhoods\Bradfab\Fabricator\FactoryInterface;
use Neighborhoods\Bradfab\Protean;
use ReflectionClass;

class Bradfab implements BradfabInterface
{
    use Protean\Container\Builder\AwareTrait;

    public function run(): BradfabInterface
    {
        $this->getProteanContainerBuilder()->setCachedContainerFileName((new ReflectionClass($this))->getShortName());
        $this->getProteanContainerBuilder()->setCanBuildZendExpressive(false);
        $this->getProteanContainerBuilder()->setCanCacheContainer(false);
        $this->getProteanContainerBuilder()->registerServiceAsPublic(FactoryInterface::class);
        $fabricator = $this->getProteanContainerBuilder()->build()->get(FactoryInterface::class)->create();
        $fabricator->fabricate();

        return $this;
    }
}
