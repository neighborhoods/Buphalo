<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler;

use Neighborhoods\Bradfab\Actor\Template\CompilerInterface;

interface BuilderInterface
{
    public function build(): CompilerInterface;
}
