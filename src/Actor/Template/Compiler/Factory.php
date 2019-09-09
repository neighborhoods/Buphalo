<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Compiler;

use Neighborhoods\Buphalo\Actor\Template\CompilerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): CompilerInterface
    {
        return clone $this->getActorTemplateCompiler();
    }
}
