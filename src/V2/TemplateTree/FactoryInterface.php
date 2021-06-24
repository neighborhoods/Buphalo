<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TemplateTree;

use Neighborhoods\Buphalo\V2\TemplateTreeInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): TemplateTreeInterface;
}
