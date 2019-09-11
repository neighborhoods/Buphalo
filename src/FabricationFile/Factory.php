<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile;

use Neighborhoods\Buphalo\FabricationFileInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FabricationFileInterface
    {
        return clone $this->getFabricationFile();
    }
}
