<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Map\Builder;

use Neighborhoods\Bradfab\FabricationFile\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
