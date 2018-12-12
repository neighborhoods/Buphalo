<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\Map\Builder;

use Rhift\BradFab\FabricationFile\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
