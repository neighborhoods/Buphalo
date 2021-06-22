<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile;

use Neighborhoods\Buphalo\V2\FabricationFileInterface;

interface FactoryInterface
{
    public function create(): FabricationFileInterface;
}
