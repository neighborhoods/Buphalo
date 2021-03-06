<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Builder;

use Neighborhoods\Buphalo\V1\FabricationFile\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
