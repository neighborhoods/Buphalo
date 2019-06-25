<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor\Builder;

use Neighborhoods\BradfabTemplateTree\Actor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
