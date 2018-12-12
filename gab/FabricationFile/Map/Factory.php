<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\Map;

use Rhift\BradFab\FabricationFile\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getFabricationFileMap()->getArrayCopy();
    }
}
