<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile;

use Rhift\BradFab\FabricationFileInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): FabricationFileInterface
    {
        return clone $this->getFabricationFile();
    }
}
