<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Compiler;

use Neighborhoods\Bradfab\ActorInterface;
use Neighborhoods\Bradfab\FabricationFile\SupportingActorInterface;

interface StrategyInterface
{
    public function setActor(ActorInterface $TargetPrimaryActor);

    public function getActor(): ActorInterface;

    public function setFabricationFileSupportingActor(SupportingActorInterface $FabricationFileActor);

    public function getPropertyReplacement(): string;

    public function getPropertyReferenceReplacement(): string;

    public function getVariableReplacement(): string;

    public function getInterfaceReplacement(): string;

    public function getTraitReplacement(): string;

    public function getActorShortNameReplacement(): string;
}
