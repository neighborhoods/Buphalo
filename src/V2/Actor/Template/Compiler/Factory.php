<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\Compiler;

use Neighborhoods\Buphalo\V2\Actor\Template\CompilerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): CompilerInterface
    {
        return clone $this->getActorTemplateCompiler();
    }
}
