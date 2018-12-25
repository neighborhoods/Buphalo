<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Map\Builder;

use Rhift\Bradfab\AnnotationProcessor\Map\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getAnnotationProcessorMapBuilder();
    }
}
