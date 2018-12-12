<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\Map;

use Rhift\BradFab\FabricationFile\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
