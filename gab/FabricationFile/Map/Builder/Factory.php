<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\Map\Builder;

use Rhift\Bradfab\FabricationFile\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileMapBuilder();
    }
}
