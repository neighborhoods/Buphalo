<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\PropertyReference\Compiler;

use Rhift\Bradfab\SupportingActor\Template\PropertyReference\CompilerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): CompilerInterface
    {
        return clone $this->getSupportingActorTemplatePropertyReferenceCompiler();
    }
}
