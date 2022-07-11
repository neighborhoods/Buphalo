<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor\Map;

use Neighborhoods\Buphalo\V2\AnnotationProcessor\MapInterface;

interface FactoryInterface
{
    public function create(): MapInterface;
}
