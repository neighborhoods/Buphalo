<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy;

use Rhift\Bradfab\SupportingActor\Template\Compiler\StrategyInterface;

interface BuilderInterface
{
    public function build(): StrategyInterface;

    public function setRecord(array $record): BuilderInterface;
}
