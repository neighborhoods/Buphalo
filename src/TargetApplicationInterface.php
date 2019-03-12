<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

interface TargetApplicationInterface
{
    public function getNamespace(): string;

    public function setNamespace(string $namespace): TargetApplicationInterface;

    public function setSourceDirectoryPath(string $source_directory_path): TargetApplicationInterface;

    public function getSourceDirectoryPath(): string;

    public function setFabricationPath(string $fabrication_path): TargetApplicationInterface;

    public function getFabricationPath(): string;
}
