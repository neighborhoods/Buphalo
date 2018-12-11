<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

interface BradfabInterface
{
    public function fabricate();

    public function setFilesystem(Filesystem $filesystem): BradfabInterface;

    public function setFinder(Finder $finder): BradfabInterface;

    public function setTargetNamespace(string $target_namespace): BradfabInterface;

    public function getFilesystem(): Filesystem;

    public function getFabricationPath(): string;

    public function setSourcePath(string $source_path): BradfabInterface;

    public function setFabricationPath(string $fabrication_path): BradfabInterface;

    public function getTargetNamespace(): string;
}
