<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor\Builder;

use Neighborhoods\Buphalo\V2\AnnotationProcessor\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getAnnotationProcessorBuilder();
    }
}
