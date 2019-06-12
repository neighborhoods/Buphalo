<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Actor\Map\Builder;

use Neighborhoods\Bradfab\TemplateTree\Actor\Map\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
