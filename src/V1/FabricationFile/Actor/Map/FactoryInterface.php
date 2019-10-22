<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Actor\Map;

use Neighborhoods\Buphalo\V1\FabricationFile\Actor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
