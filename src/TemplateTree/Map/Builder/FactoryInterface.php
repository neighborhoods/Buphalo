<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree\Map\Builder;

use Neighborhoods\Buphalo\TemplateTree\Map\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
