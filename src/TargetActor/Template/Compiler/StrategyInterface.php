<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Compiler;

use Neighborhoods\Bradfab\TargetActorInterface;

interface StrategyInterface
{
    public function setTargetActor(TargetActorInterface $TargetActor);

    public function getTargetActor(): TargetActorInterface;

    public function getPropertyReplacement(): string;

    public function getFQCNReplacement(): string;

    public function getPropertyReferenceReplacement(): string;

    public function getVariableReplacement(): string;

    public function getMethodAndCommentReplacement(): string;

    public function getInterfaceReplacement(): string;

    public function getTraitReplacement(): string;
}
