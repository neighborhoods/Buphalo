<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Map;

use Neighborhoods\Buphalo\V2\FabricationFile\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getFabricationFileMap()->getArrayCopy();
    }
}
