<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler\Strategy;

use Neighborhoods\Bradfab\Actor\Template\Compiler\StrategyInterface;

interface FactoryInterface
{
    public function create(): StrategyInterface;
}
