<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Context\Builder;

use Neighborhoods\Buphalo\AnnotationProcessor\Context\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getAnnotationProcessorContextBuilder();
    }
}
