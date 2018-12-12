<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\FabricationFileInterface;

interface BuilderInterface
{
    public function build(): FabricationFileInterface;

    public function setRecord(array $record): BuilderInterface;
}
