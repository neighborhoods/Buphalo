<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Compiler;

use Neighborhoods\Buphalo\V1\Actor\Template\CompilerInterface;

interface FactoryInterface
{
    public function create(): CompilerInterface;
}
