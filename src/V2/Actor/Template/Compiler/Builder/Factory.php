<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\Compiler\Builder;

use Neighborhoods\Buphalo\V2\Actor\Template\Compiler\BuilderInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getActorTemplateCompilerBuilder();
    }
}
