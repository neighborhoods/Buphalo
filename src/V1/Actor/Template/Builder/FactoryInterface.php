<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Builder;

use Neighborhoods\Buphalo\V1\Actor\Template\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
