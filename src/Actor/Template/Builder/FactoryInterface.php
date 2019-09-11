<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Builder;

use Neighborhoods\Buphalo\Actor\Template\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
