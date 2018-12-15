<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Variable\Compiler;

use Rhift\Bradfab\SupportingActor\Template\Variable\CompilerInterface;

interface FactoryInterface
{
    public function create(): CompilerInterface;
}
