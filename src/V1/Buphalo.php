<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

use Neighborhoods\Buphalo\V1\Fabricator\FactoryInterface;
use Neighborhoods\Buphalo\V1\Protean;
use ReflectionClass;

class Buphalo implements BuphaloInterface
{
    use Protean\Container\Builder\AwareTrait;

    public function run(): BuphaloInterface
    {
        $this->getProteanContainerBuilder()->setCachedContainerFileName(
            sprintf(
                '%s.php',
                (new ReflectionClass($this))->getShortName()
            )
        );
        $this->getProteanContainerBuilder()->setCanBuildZendExpressive(false);
        $this->getProteanContainerBuilder()->setCanCacheContainer(false);
        $this->getProteanContainerBuilder()->registerServiceAsPublic(FactoryInterface::class);
        $fabricator = $this->getProteanContainerBuilder()->build()->get(FactoryInterface::class)->create();
        $fabricator->fabricate();

        return $this;
    }
}
