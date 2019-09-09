<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Map;

use Neighborhoods\Buphalo\AnnotationProcessor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
