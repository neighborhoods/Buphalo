<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor\Builder;

use Neighborhoods\Bradfab\FabricationFile\SupportingActor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
