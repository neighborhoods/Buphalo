<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor;

use Rhift\BradFab\FabricationFile\SupportingActorInterface;

interface FactoryInterface
{
    public function create(): SupportingActorInterface;
}
