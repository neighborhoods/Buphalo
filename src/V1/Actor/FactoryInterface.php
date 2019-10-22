<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor;

use Neighborhoods\Buphalo\V1\ActorInterface;

interface FactoryInterface
{
    public function create(): ActorInterface;
}
