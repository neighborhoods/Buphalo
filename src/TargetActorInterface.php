<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

interface TargetActorInterface
{
    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function setTargetApplication(TargetApplicationInterface $TargetApplication);

    public function getName(): string;

    public function getFQCN(): string;

    public function getShortName(): string;

    public function getRelativeNamePath(): string;

    public function getFilePathPosition(): string;
}
