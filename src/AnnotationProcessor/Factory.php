<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor;

use Neighborhoods\Bradfab\AnnotationProcessorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): AnnotationProcessorInterface
    {
        return clone $this->getAnnotationProcessor();
    }
}
