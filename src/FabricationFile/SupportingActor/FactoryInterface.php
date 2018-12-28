<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor;

use Neighborhoods\Bradfab\FabricationFile\SupportingActorInterface;

interface FactoryInterface
{
    public function create(): SupportingActorInterface;
}
