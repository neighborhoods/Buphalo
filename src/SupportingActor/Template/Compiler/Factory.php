<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Compiler;

use Neighborhoods\Bradfab\SupportingActor\Template\CompilerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): CompilerInterface
    {
        return clone $this->getSupportingActorTemplateCompiler();
    }
}
