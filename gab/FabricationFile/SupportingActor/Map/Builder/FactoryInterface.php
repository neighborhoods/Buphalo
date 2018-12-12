<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor\Map\Builder;

use Rhift\BradFab\FabricationFile\SupportingActor\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
