<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Actor\Builder;

use Neighborhoods\Bradfab\TemplateTree\Actor\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
