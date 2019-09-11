<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Actor\Builder;

use Neighborhoods\Buphalo\FabricationFile\Actor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
