<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor\Map;

use Neighborhoods\Buphalo\V2\AnnotationProcessor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getAnnotationProcessorMap()->getArrayCopy();
    }
}
