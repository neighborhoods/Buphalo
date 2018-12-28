<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Builder;

use Neighborhoods\Bradfab\AnnotationProcessor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getAnnotationProcessorBuilder();
    }
}
