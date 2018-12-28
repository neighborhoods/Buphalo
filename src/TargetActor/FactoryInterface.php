<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor;

use Neighborhoods\Bradfab\TargetActorInterface;

interface FactoryInterface
{
    public function create(): TargetActorInterface;
}
