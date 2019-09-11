<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Map;

use Neighborhoods\Buphalo\AnnotationProcessor\MapInterface;
use Neighborhoods\Buphalo\FabricationFileInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}

