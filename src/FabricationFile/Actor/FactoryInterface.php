<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Actor;

use Neighborhoods\Buphalo\FabricationFile\ActorInterface;

interface FactoryInterface
{
    public function create(): ActorInterface;
}
