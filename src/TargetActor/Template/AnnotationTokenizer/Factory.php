<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\AnnotationTokenizer;

use Neighborhoods\Bradfab\TargetActor\Template\AnnotationTokenizerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): AnnotationTokenizerInterface
    {
        return clone $this->getTargetActorTemplateAnnotationTokenizer();
    }
}
