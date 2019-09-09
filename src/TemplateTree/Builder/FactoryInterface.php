<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree\Builder;

use Neighborhoods\Buphalo\TemplateTree\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
