<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor\Map;

use Rhift\BradFab\FabricationFile\SupportingActor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
