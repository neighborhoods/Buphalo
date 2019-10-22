<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TemplateTree\Builder;

use Neighborhoods\Buphalo\V1\TemplateTree\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
