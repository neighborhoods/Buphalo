<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor;

use Neighborhoods\Buphalo\V2\AnnotationProcessorInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): AnnotationProcessorInterface
    {
        return clone $this->getAnnotationProcessor();
    }
}
