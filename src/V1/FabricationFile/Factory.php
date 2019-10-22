<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile;

use Neighborhoods\Buphalo\V1\FabricationFileInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FabricationFileInterface
    {
        return clone $this->getFabricationFile();
    }
}
