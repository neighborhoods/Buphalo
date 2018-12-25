<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\FabricationFileInterface;
use Symfony\Component\Finder\SplFileInfo;

interface BuilderInterface
{
    public function build(): FabricationFileInterface;

    public function setSplFileInfo(SplFileInfo $spl_file_info): BuilderInterface;
}
