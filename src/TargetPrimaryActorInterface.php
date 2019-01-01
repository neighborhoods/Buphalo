<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

interface TargetPrimaryActorInterface
{
    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function setTargetApplication(TargetApplicationInterface $TargetApplication);

    public function getNamespace(): string;

    public function getFullName(): string;

    public function getRelativeNamePath(): string;

    public function getFilePathPosition(): string;

    public function getShortName(): string;
}
