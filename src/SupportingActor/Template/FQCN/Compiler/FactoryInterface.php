<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler;

use Rhift\Bradfab\SupportingActor\Template\FQCN\CompilerInterface;

interface FactoryInterface
{
    public function create(): CompilerInterface;
}
