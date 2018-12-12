<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile;

interface BuilderInterface
{
    public function setRecord(array $record): BuilderInterface;
}
