<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetApplication\Builder;

use Neighborhoods\Bradfab\TargetApplication\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
