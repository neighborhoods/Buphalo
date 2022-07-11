<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile;

use Neighborhoods\Buphalo\V2\FabricationFileInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FabricationFileInterface
    {
        return clone $this->getFabricationFile();
    }
}
