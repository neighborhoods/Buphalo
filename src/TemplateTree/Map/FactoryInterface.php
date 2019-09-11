<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TemplateTree\Map;

use Neighborhoods\Buphalo\TemplateTree\MapInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): MapInterface;
}
