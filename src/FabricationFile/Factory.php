<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\FabricationFileInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FabricationFileInterface
    {
        return clone $this->getFabricationFile();
    }
}
