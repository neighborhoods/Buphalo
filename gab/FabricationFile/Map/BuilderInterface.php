<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\Map;

use Rhift\BradFab\FabricationFile\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setRecord(array $record): BuilderInterface;
}
