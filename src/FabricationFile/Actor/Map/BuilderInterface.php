<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Actor\Map;

use Neighborhoods\Buphalo\FabricationFile\Actor\MapInterface;
use Neighborhoods\Buphalo\FabricationFileInterface;

interface BuilderInterface
{
    public const ACTORS = 'actors';

    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}
