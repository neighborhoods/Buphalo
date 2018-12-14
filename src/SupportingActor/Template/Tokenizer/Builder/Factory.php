<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Tokenizer\Builder;

use Rhift\Bradfab\SupportingActor\Template\Tokenizer\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getSupportingActorTemplateTokenizerBuilder();
    }
}
