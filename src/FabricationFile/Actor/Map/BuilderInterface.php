<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor\Map;

use Neighborhoods\Bradfab\FabricationFile\Actor\MapInterface;
use Neighborhoods\Bradfab\FabricationFileInterface;

interface BuilderInterface
{
    public const ACTORS = 'actors';

    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}
