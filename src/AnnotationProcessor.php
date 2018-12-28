<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

class AnnotationProcessor implements AnnotationProcessorInterface
{
    use AnnotationProcessor\Context\AwareTrait {
        getAnnotationProcessorContext as public;
    }

    public function getReplacement(): string
    {
        return rtrim($this->getAnnotationProcessorContext()->getAnnotationContents());
    }
}
