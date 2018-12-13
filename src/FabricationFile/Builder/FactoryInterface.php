<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\Builder;

use Rhift\Bradfab\FabricationFile\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
