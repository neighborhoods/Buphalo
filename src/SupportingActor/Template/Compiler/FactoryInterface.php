<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Compiler;

use Neighborhoods\Bradfab\SupportingActor\Template\CompilerInterface;

interface FactoryInterface
{
    public function create(): CompilerInterface;
}
