<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use Neighborhoods\Bradfab\ActorInterface;

interface FactoryInterface
{
    public function create(): ActorInterface;
}
