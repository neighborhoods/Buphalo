<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\AnnotationTokenizer;

use Rhift\Bradfab\SupportingActor\Template\AnnotationTokenizerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): AnnotationTokenizerInterface
    {
        return clone $this->getSupportingActorTemplateAnnotationTokenizer();
    }
}
