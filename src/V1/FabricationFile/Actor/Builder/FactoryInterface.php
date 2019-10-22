<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Actor\Builder;

use Neighborhoods\Buphalo\V1\FabricationFile\Actor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
