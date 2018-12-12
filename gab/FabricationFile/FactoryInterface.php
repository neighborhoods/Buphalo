<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\FabricationFileInterface;

interface FactoryInterface
{
    public function create(): FabricationFileInterface;
}
