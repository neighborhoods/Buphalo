<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

interface TargetApplicationInterface
{
    public function getNamespacePrefix(): string;

    public function setNamespacePrefix(string $NamespacePrefix): TargetApplicationInterface;

    public function setSourceDirectoryPath(string $source_directory_path): TargetApplicationInterface;

    public function getSourceDirectoryPath(): string;

    public function setFabricationDirectoryPath(string $FabricationDirectoryPath): TargetApplicationInterface;

    public function getFabricationDirectoryPath(): string;
}
