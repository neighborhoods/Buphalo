<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\Map\Builder;

use Rhift\Bradfab\FabricationFile\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
