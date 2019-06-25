<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Builder;

use Neighborhoods\Bradfab\TemplateTree\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
