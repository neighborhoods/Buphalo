<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

interface TargetPrimaryActorInterface
{
    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function setTargetApplication(TargetApplicationInterface $TargetApplication);

    public function getNamespacePrefix(): string;

    public function getFullCapitalCamelCaseName(): string;

    public function getRelativeClassPath(): string;

    public function getSourceDirectoryPath(): string;

    public function getShortCapitalCamelCaseName(): string;

    public function getFabricationDirectoryPath(): string;
}
