<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor;

use Neighborhoods\Buphalo\AnnotationProcessorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): AnnotationProcessorInterface
    {
        return clone $this->getAnnotationProcessor();
    }
}
