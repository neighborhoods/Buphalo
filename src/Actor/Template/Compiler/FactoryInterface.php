<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Compiler;

use Neighborhoods\Buphalo\Actor\Template\CompilerInterface;

interface FactoryInterface
{
    public function create(): CompilerInterface;
}
