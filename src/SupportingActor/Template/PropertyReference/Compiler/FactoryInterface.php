<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\PropertyReference\Compiler;

use Rhift\Bradfab\SupportingActor\Template\PropertyReference\CompilerInterface;

interface FactoryInterface
{
    public function create(): CompilerInterface;
}
