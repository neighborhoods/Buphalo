<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor;

use Neighborhoods\BradfabTemplateTree\ActorInterface;

interface FactoryInterface
{
    public function create(): ActorInterface;
}
