<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Compiler\Strategy;

use Neighborhoods\Bradfab\TargetActor\Template\Compiler\StrategyInterface;

interface FactoryInterface
{
    public function create(): StrategyInterface;
}
