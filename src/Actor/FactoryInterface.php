<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor;

use Neighborhoods\Buphalo\ActorInterface;

interface FactoryInterface
{
    public function create(): ActorInterface;
}
