<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Actor\Map;

use Neighborhoods\Bradfab\TemplateTree\Actor\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;
}

