<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Compiler;

use Neighborhoods\Bradfab\TargetPrimaryActorInterface;

interface StrategyInterface
{
    public function setTargetPrimaryActor(TargetPrimaryActorInterface $TargetPrimaryActor);

    public function getTargetPrimaryActor(): TargetPrimaryActorInterface;

    public function getPropertyReplacement(): string;

    public function getPropertyReferenceReplacement(): string;

    public function getVariableReplacement(): string;

    public function getInterfaceReplacement(): string;

    public function getTraitReplacement(): string;
}
