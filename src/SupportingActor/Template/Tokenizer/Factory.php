<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Tokenizer;

use Neighborhoods\Bradfab\SupportingActor\Template\TokenizerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TokenizerInterface
    {
        return clone $this->getSupportingActorTemplateTokenizer();
    }
}
