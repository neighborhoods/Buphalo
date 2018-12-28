<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Compiler\Strategy;

use Neighborhoods\Bradfab\SupportingActor\Template\Compiler\StrategyInterface;

interface FactoryInterface
{
    public function create(): StrategyInterface;
}
