<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\AnnotationTokenizer;

use Neighborhoods\Buphalo\Actor\Template\AnnotationTokenizerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): AnnotationTokenizerInterface
    {
        return clone $this->getActorTemplateAnnotationTokenizer();
    }
}
