<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Fabricator;

use Rhift\Bradfab\FabricatorInterface;

interface BuilderInterface
{
    public function build(): FabricatorInterface;

    public function setRecord(array $record): BuilderInterface;
}
