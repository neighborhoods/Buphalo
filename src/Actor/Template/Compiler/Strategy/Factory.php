<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler\Strategy;

use Neighborhoods\Bradfab\Actor\Template\Compiler\StrategyInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): StrategyInterface
    {
        return clone $this->getTargetActorTemplateCompilerStrategy();
    }
}
