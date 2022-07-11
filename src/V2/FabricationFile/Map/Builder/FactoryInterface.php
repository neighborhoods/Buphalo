<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Map\Builder;

use Neighborhoods\Buphalo\V2\FabricationFile\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
