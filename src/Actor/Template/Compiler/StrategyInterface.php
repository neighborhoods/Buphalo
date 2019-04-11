<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler;

use Neighborhoods\Bradfab\FabricationFile\ActorInterface;
use Neighborhoods\Bradfab\TargetPrimaryActorInterface;

interface StrategyInterface
{
    public function setTargetPrimaryActor(TargetPrimaryActorInterface $TargetPrimaryActor);

    public function getTargetPrimaryActor(): TargetPrimaryActorInterface;

    public function setFabricationFileActor(ActorInterface $FabricationFileActor);

    public function getPropertyReplacement(): string;

    public function getPropertyReferenceReplacement(): string;

    public function getVariableReplacement(): string;

    public function getInterfaceReplacement(): string;

    public function getTraitReplacement(): string;

    public function getActorShortNameReplacement(): string;
}
