<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Actor;

use Neighborhoods\Buphalo\V2\FabricationFile\ActorInterface;

interface FactoryInterface
{
    public function create(): ActorInterface;
}
