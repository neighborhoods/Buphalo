<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Compiler;

use Neighborhoods\Bradfab\TargetActor\Template\CompilerInterface;

interface FactoryInterface
{
    public function create(): CompilerInterface;
}
