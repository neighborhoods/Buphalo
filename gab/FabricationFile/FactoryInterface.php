<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile;

use Rhift\BradFab\FabricationFileInterface;

interface FactoryInterface
{
    public function create(): FabricationFileInterface;
}
