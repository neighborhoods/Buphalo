<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\TargetApplication\Builder;

use Neighborhoods\Buphalo\TargetApplication\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
