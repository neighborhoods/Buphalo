<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor\Map;

use Neighborhoods\Buphalo\V1\AnnotationProcessor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
