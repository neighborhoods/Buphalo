<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Map\Builder;

use Neighborhoods\Bradfab\AnnotationProcessor\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getAnnotationProcessorMapBuilder();
    }
}
