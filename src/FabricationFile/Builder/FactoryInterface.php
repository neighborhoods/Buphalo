<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Builder;

use Neighborhoods\Bradfab\FabricationFile\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
