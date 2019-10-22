<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor;

use Neighborhoods\Buphalo\V1\AnnotationProcessorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): AnnotationProcessorInterface
    {
        return clone $this->getAnnotationProcessor();
    }
}
