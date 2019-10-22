<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor\Context;

use Neighborhoods\Buphalo\V1\AnnotationProcessor\ContextInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ContextInterface
    {
        return clone $this->getAnnotationProcessorContext();
    }
}
