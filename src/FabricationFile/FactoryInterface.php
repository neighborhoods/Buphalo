<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile;

use Neighborhoods\Buphalo\FabricationFileInterface;

interface FactoryInterface
{
    public function create(): FabricationFileInterface;
}
