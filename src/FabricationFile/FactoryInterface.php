<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile;

use Neighborhoods\Bradfab\FabricationFileInterface;

interface FactoryInterface
{
    public function create(): FabricationFileInterface;
}
