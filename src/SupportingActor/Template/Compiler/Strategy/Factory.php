<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Compiler\Strategy;

use Neighborhoods\Bradfab\SupportingActor\Template\Compiler\StrategyInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): StrategyInterface
    {
        return clone $this->getSupportingActorTemplateCompilerStrategy();
    }
}
