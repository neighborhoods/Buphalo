<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor\Map;

use Rhift\Bradfab\Template\Actor\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setRecord(array $record): BuilderInterface;
}
