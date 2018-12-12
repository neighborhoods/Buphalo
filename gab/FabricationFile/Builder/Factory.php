<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\Builder;

use Rhift\BradFab\FabricationFile\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileBuilder();
    }
}
