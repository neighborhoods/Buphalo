<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Context;

use Neighborhoods\Buphalo\AnnotationProcessor\ContextInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ContextInterface
    {
        return clone $this->getAnnotationProcessorContext();
    }
}
