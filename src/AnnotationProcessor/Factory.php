<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor;

use Rhift\Bradfab\AnnotationProcessorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): AnnotationProcessorInterface
    {
        return clone $this->getAnnotationProcessor();
    }
}
