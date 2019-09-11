<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Map\Builder;

use Neighborhoods\Buphalo\AnnotationProcessor\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getAnnotationProcessorMapBuilder();
    }
}
