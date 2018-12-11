<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Rhift\Bradfab\Protean;

class Bradfab implements BradfabInterface
{
    use Protean\Container\Builder\AwareTrait;

    public function run(): BradfabInterface
    {
        $this->getProteanContainerBuilder()->setBuildZendExpressive(false);
        $this->getProteanContainerBuilder()->registerServiceAsPublic(FabricatorInterface::class);
        $fabricator = $this->getProteanContainerBuilder()->build()->get(FabricatorInterface::class);
        $fabricator->fabricate();

        return $this;
    }
}
