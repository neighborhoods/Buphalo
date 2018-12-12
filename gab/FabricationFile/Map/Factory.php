<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\Map;

use Rhift\Bradfab\FabricationFile\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getFabricationFileMap()->getArrayCopy();
    }
}
