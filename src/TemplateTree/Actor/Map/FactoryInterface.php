<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Actor\Map;

use Neighborhoods\Bradfab\TemplateTree\Actor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
