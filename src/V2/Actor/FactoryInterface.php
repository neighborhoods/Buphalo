<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor;

use Neighborhoods\Buphalo\V2\ActorInterface;

interface FactoryInterface
{
    public function create(): ActorInterface;
}
