<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy\Builder;

use Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getSupportingActorTemplateCompilerStrategyBuilder();
    }
}
