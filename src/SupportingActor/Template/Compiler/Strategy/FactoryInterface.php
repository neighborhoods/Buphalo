<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy;

use Rhift\Bradfab\SupportingActor\Template\Compiler\StrategyInterface;

interface FactoryInterface
{
    public function create(): StrategyInterface;
}
