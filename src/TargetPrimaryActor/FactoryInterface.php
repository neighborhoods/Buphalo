<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetPrimaryActor;

use Neighborhoods\Bradfab\TargetPrimaryActorInterface;

interface FactoryInterface
{
    public function create(): TargetPrimaryActorInterface;
}
