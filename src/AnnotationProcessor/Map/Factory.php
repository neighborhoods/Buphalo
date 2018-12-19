<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Map;

use Rhift\Bradfab\AnnotationProcessor\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getAnnotationProcessorMap()->getArrayCopy();
    }
}
