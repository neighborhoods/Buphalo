<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler;

use Rhift\Bradfab\SupportingActor\Template\CompilerInterface;

interface FactoryInterface
{
    public function create(): CompilerInterface;
}
