<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Actor;

use Neighborhoods\Bradfab\TemplateTree\ActorInterface;

interface FactoryInterface
{
    public function create(): ActorInterface;
}
