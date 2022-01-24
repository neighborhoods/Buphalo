<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile;

use Neighborhoods\Buphalo\V1\FabricationFileInterface;

interface WriterInterface
{
    public const DEFAULT_INDENT_SIZE = 2;

    public function write(FabricationFileInterface $fabricationFile, int $indentSize = self::DEFAULT_INDENT_SIZE): self;
}
