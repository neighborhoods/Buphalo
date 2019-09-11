<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Map;

use Neighborhoods\Buphalo\FabricationFile\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getFabricationFileMap()->getArrayCopy();
    }
}
