<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor\Map;

use Neighborhoods\Bradfab\FabricationFile\Actor\MapInterface;

interface BuilderInterface
{
    public const ACTORS = 'actors';
    public const RELATIVE_TEMPLATE_PATH = 'relative_template_path';

    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;
}

