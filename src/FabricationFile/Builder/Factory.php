<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Builder;

use Neighborhoods\Buphalo\FabricationFile\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileBuilder();
    }
}
