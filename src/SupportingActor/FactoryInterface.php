<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor;

use Neighborhoods\Bradfab\SupportingActorInterface;

interface FactoryInterface
{
    public function create(): SupportingActorInterface;
}
