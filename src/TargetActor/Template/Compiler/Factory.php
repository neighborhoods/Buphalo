<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Compiler;

use Neighborhoods\Bradfab\TargetActor\Template\CompilerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): CompilerInterface
    {
        return clone $this->getTargetActorTemplateCompiler();
    }
}
