<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor\Map\Builder;

use Neighborhoods\Buphalo\V2\AnnotationProcessor\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getAnnotationProcessorMapBuilder();
    }
}
