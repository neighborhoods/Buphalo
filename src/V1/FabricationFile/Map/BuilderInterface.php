<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Map;

use Neighborhoods\Buphalo\V1\FabricationFile\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setFinderFileNames(array $FinderFileNames): BuilderInterface;
}

