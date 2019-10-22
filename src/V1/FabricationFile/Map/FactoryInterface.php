<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Map;

use Neighborhoods\Buphalo\V1\FabricationFile\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
