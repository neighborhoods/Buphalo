<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\TargetApplication\Builder;

use Neighborhoods\Buphalo\V2\TargetApplication\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
