<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Actor\Map;

use Neighborhoods\Buphalo\FabricationFile\Actor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
