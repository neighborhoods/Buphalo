<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree;

use Neighborhoods\Buphalo\TemplateTreeInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): TemplateTreeInterface;
}
