<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile;

use Neighborhoods\Bradfab\FabricationFileInterface;
use Symfony\Component\Finder\SplFileInfo;

interface BuilderInterface
{
    public function build(): FabricationFileInterface;

    public function setSplFileInfo(SplFileInfo $spl_file_info): BuilderInterface;
}