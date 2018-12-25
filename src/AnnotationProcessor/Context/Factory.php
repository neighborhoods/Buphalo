<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Context;

use Rhift\Bradfab\AnnotationProcessor\ContextInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): ContextInterface
    {
        return clone $this->getAnnotationProcessorContext();
    }
}
