<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

interface TargetApplicationInterface
{
    public function getNamespace(): string;

    public function setNamespace(string $namespace): TargetApplicationInterface;

    public function setSourcePath(string $source_path): TargetApplicationInterface;

    public function getSourcePath(): string;

    public function setFabricationPath(string $fabrication_path): TargetApplicationInterface;

    public function getFabricationPath(): string;
}
