<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Api;

interface DumperInterface
{
    public function dumpFile(FabricationFileInterface $fabricationFile): Dumper;

    public function dump(FabricationFileInterface $fabricationFile): string;
}
