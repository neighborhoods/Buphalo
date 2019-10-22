<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TemplateTree;

use Neighborhoods\Buphalo\V1\TemplateTreeInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): TemplateTreeInterface;
}
