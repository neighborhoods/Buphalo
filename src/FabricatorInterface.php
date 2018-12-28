<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

interface FabricatorInterface
{
    public function fabricate();

    public function setFilesystem(Filesystem $filesystem): FabricatorInterface;

    public function setFinder(Finder $finder): FabricatorInterface;

    public function getFilesystem(): Filesystem;
}
