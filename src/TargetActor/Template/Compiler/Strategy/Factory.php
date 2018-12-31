<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Compiler\Strategy;

use Neighborhoods\Bradfab\TargetActor\Template\Compiler\StrategyInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): StrategyInterface
    {
        return clone $this->getTargetActorTemplateCompilerStrategy();
    }
}
