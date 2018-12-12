<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor\Map;

use Rhift\BradFab\FabricationFile\SupportingActor\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setRecord(array $record): BuilderInterface;
}
