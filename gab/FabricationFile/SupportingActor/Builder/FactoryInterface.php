<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor\Builder;

use Rhift\BradFab\FabricationFile\SupportingActor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
