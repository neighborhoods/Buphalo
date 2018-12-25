<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Context\Builder;

use Rhift\Bradfab\AnnotationProcessor\Context\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getAnnotationProcessorContextBuilder();
    }
}
