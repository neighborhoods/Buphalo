<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

interface ActorInterface
{
    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);

    public function setTargetPrimaryActor(TargetPrimaryActorInterface $TargetPrimaryActor);

    public function getShortPascalCaseName(): string;

    public function getFabricationFilePath(): string;

    public function getRelativeNamePath(): string;

    public function getFileExtension(): string;

    public function getRelativeClassNamePath(): string;

    public function getRelativeFabricationFilePath(): string;

    public function getSourceFilePath(): string;
}
