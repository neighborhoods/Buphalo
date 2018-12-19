<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Map;

use Rhift\Bradfab\AnnotationProcessor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
