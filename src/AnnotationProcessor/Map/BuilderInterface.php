<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Map;

use Rhift\Bradfab\AnnotationProcessor\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;
}

