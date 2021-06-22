<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree\Builder;

use Neighborhoods\Buphalo\V2\TemplateTree\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
