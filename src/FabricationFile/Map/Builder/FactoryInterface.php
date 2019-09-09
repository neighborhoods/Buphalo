<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Map\Builder;

use Neighborhoods\Buphalo\FabricationFile\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
