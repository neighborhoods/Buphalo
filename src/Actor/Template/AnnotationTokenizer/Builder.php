<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizer;

use Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizerInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    public function build(): AnnotationTokenizerInterface
    {
        $annotationTokenizer = $this->getActorTemplateAnnotationTokenizerFactory()->create();

        // @TODO - build the object.

        return $annotationTokenizer;
    }
}
