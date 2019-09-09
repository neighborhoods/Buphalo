<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Builder;

use Neighborhoods\Buphalo\AnnotationProcessor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getAnnotationProcessorBuilder();
    }
}
