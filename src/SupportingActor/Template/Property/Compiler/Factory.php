<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Property\Compiler;

use Rhift\Bradfab\SupportingActor\Template\Property\CompilerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): CompilerInterface
    {
        return clone $this->getSupportingActorTemplatePropertyCompiler();
    }
}
