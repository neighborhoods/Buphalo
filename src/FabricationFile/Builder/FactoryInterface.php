<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Builder;

use Neighborhoods\Buphalo\FabricationFile\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
