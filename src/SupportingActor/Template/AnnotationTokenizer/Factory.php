<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\AnnotationTokenizer;

use Neighborhoods\Bradfab\SupportingActor\Template\AnnotationTokenizerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): AnnotationTokenizerInterface
    {
        return clone $this->getSupportingActorTemplateAnnotationTokenizer();
    }
}
