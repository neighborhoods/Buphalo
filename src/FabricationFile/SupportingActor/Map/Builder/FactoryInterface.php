<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map\Builder;

use Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
