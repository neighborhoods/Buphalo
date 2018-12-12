<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\Map;

use Rhift\Bradfab\FabricationFile\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
