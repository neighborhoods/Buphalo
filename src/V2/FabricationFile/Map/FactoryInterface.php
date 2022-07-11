<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Map;

use Neighborhoods\Buphalo\V2\FabricationFile\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
