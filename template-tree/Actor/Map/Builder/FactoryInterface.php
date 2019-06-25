<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor\Map\Builder;

use Neighborhoods\BradfabTemplateTree\Actor\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
