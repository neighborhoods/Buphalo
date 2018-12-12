<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\Map;

use Rhift\Bradfab\FabricationFile\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setRecord(array $record): BuilderInterface;
}

