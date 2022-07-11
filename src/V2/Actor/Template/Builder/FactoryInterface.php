<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\Builder;

use Neighborhoods\Buphalo\V2\Actor\Template\BuilderInterface;

/** @codeCoverageIgnore */
interface FactoryInterface
{
    public function create(): BuilderInterface;
}
