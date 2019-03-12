<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use Neighborhoods\Bradfab\FabricationFile\ActorInterface;

interface TargetActorInterface
{
    public function setFabricationFileActor(ActorInterface $FabricationFileActor);

    public function setTargetPrimaryActor(TargetPrimaryActorInterface $TargetPrimaryActor);

    public function getShortName(): string;

    public function getFabricationFilePath(): string;

    public function getRelativeNamePath(): string;

    public function getFileExtension(): string;

    public function getRelativeClassNamePath(): string;

    public function getRelativeFabricationFilePath(): string;

    public function getSourceFilePath(): string;
}
