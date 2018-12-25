<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy;

use Rhift\Bradfab\SupportingActor\Template\Compiler\StrategyInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): StrategyInterface
    {
        return clone $this->getSupportingActorTemplateCompilerStrategy();
    }
}
