<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor\Builder;

use Neighborhoods\Buphalo\V1\AnnotationProcessor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getAnnotationProcessorBuilder();
    }
}
