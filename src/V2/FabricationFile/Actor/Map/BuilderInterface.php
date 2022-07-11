<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Actor\Map;

use Neighborhoods\Buphalo\V2\FabricationFile\Actor\MapInterface;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;

interface BuilderInterface
{
    public const ACTORS = 'actors';

    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}
