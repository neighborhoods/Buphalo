<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Builder;

use Neighborhoods\Buphalo\V2\FabricationFile\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
