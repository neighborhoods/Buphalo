<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TargetApplication\Builder;

use Neighborhoods\Buphalo\V1\TargetApplication\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
