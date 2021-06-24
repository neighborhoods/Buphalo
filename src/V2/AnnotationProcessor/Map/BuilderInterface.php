<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor\Map;

use Neighborhoods\Buphalo\V2\AnnotationProcessor\MapInterface;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}

