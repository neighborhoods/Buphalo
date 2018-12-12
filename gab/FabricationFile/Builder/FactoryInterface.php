<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\Builder;

use Rhift\BradFab\FabricationFile\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
