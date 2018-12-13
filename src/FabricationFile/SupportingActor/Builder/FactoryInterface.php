<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor\Builder;

use Rhift\Bradfab\FabricationFile\SupportingActor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
