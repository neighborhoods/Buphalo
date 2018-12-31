<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor\Map;

use Neighborhoods\Bradfab\FabricationFile\Actor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
