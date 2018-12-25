<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Builder;

use Rhift\Bradfab\AnnotationProcessor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getAnnotationProcessorBuilder();
    }
}
