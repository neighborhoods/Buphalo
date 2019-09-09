<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Map;

use Neighborhoods\Bradfab\FabricationFile\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;
}

