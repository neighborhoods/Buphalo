<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Actor;

use Neighborhoods\Buphalo\V1\FabricationFile\ActorInterface;

interface FactoryInterface
{
    public function create(): ActorInterface;
}
