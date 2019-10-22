<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TemplateTree\Map;

use Neighborhoods\Buphalo\V1\TemplateTree\MapInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): MapInterface;
}
