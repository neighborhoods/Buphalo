<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

interface FabricatorInterface
{
    public function fabricate();

    public function setFilesystem(Filesystem $filesystem): FabricatorInterface;

    public function setFinder(Finder $finder): FabricatorInterface;

    public function setTargetNamespace(string $target_namespace): FabricatorInterface;

    public function getFilesystem(): Filesystem;

    public function getFabricationPath(): string;

    public function setSourcePath(string $source_path): FabricatorInterface;

    public function setFabricationPath(string $fabrication_path): FabricatorInterface;

    public function getTargetNamespace(): string;

    public function getSourcePath(): string;
}
