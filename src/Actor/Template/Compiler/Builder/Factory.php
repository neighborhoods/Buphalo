<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Compiler\Builder;

use Neighborhoods\Buphalo\Actor\Template\Compiler\BuilderInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getActorTemplateCompilerBuilder();
    }
}
