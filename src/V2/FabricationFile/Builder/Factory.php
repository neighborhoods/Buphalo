<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Builder;

use Neighborhoods\Buphalo\V2\FabricationFile\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getFabricationFileBuilder();
    }
}
