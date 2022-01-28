<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Api;

interface DumperInterface
{
    public function dumpFile(FabricationFileInterface $fabricationFile, string $filePath): Dumper;

    public function dump(FabricationFileInterface $fabricationFile): string;
}
