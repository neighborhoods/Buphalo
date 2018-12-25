<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetActor;

use Rhift\Bradfab\TargetActorInterface;

interface FactoryInterface
{
    public function create(): TargetActorInterface;
}
