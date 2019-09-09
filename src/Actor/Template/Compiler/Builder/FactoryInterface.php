<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Compiler\Builder;

use Neighborhoods\Buphalo\Actor\Template\Compiler\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
