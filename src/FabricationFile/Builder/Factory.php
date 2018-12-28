<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Builder;

use Neighborhoods\Bradfab\FabricationFile\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileBuilder();
    }
}
