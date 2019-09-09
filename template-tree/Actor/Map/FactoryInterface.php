<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor\Map;

use Neighborhoods\BradfabTemplateTree\Actor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
