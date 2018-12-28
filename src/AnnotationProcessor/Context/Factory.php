<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Context;

use Neighborhoods\Bradfab\AnnotationProcessor\ContextInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ContextInterface
    {
        return clone $this->getAnnotationProcessorContext();
    }
}
