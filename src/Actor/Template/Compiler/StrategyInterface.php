<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler;

use Neighborhoods\Bradfab\ActorInterface;

interface StrategyInterface
{
    public function setActor(ActorInterface $TargetPrimaryActor);

    public function getPropertyReplacement(): string;

    public function getPropertyReferenceReplacement(): string;

    public function getVariableReplacement(): string;

    public function getInterfaceReplacement(): string;

    public function getTraitReplacement(): string;

    public function getActorShortNameReplacement(): string;
}
