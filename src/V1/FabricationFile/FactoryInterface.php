<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile;

use Neighborhoods\Buphalo\V1\FabricationFileInterface;

interface FactoryInterface
{
    public function create(): FabricationFileInterface;
}
