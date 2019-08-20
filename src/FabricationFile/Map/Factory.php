<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Map;

use Neighborhoods\Bradfab\FabricationFile\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getFabricationFileMap()->getArrayCopy();
    }
}
