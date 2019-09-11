<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\AnnotationTokenizer\Builder;

use Neighborhoods\Buphalo\Actor\Template\AnnotationTokenizer\BuilderInterface;

/** @codeCoverageIgnore */
class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getActorTemplateAnnotationTokenizerBuilder();
    }
}
