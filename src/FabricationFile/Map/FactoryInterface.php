<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Map;

use Neighborhoods\Buphalo\FabricationFile\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
