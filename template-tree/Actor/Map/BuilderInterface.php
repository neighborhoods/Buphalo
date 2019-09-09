<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor\Map;

use Neighborhoods\BradfabTemplateTree\Actor\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;
}

