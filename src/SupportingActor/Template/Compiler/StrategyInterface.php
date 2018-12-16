<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler;

use Rhift\Bradfab\TargetActorInterface;

interface StrategyInterface
{
    public function setTargetActor(TargetActorInterface $TargetActor);

    public function getPropertyReplacement(): string;

    public function getFQCNReplacement(): string;

    public function getPropertyReferenceReplacement(): string;

    public function getVariableReplacement(): string;

    public function getMethodAndCommentReplacement(): string;

    public function getInterfaceReplacement(): string;
}
