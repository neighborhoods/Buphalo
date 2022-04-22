<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Api;

interface DumperInterface
{
    public function dumpFile(FabricationFileInterface $fabricationFile): Dumper;

    public function dump(FabricationFileInterface $fabricationFile): string;
}
