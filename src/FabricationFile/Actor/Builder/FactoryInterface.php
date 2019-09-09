<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor\Builder;

use Neighborhoods\Bradfab\FabricationFile\Actor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
