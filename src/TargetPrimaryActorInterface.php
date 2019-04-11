<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

interface TargetPrimaryActorInterface
{
    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function setTargetApplication(TargetApplicationInterface $TargetApplication);

    public function getNamespace(): string;

    public function getFullPascalCaseName(): string;

    public function getRelativeParentClassPath(): string;

    public function getSourceDirectoryPath(): string;

    public function getShortCapitalCamelCaseName(): string;

    public function getFabricationDirectoryPath(): string;

    public function getRelativeClassPath(): string;
}
