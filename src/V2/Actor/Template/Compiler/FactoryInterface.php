<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\Compiler;

use Neighborhoods\Buphalo\V2\Actor\Template\CompilerInterface;

interface FactoryInterface
{
    public function create(): CompilerInterface;
}
