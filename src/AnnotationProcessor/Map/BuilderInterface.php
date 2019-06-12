<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Map;

use Neighborhoods\Bradfab\AnnotationProcessor\MapInterface;
use Neighborhoods\Bradfab\FabricationFileInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}

