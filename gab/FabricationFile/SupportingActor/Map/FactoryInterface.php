<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor\Map;

use Rhift\Bradfab\FabricationFile\SupportingActor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
