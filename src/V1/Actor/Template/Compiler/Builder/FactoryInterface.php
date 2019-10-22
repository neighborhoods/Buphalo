<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Compiler\Builder;

use Neighborhoods\Buphalo\V1\Actor\Template\Compiler\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
