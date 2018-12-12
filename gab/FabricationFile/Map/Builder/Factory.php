<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\Map\Builder;

use Rhift\BradFab\FabricationFile\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileMapBuilder();
    }
}
