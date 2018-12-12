<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor\Map\Builder;

use Rhift\Bradfab\FabricationFile\SupportingActor\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
