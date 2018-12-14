<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Tokenizer;

use Rhift\Bradfab\SupportingActor\Template\TokenizerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TokenizerInterface
    {
        return clone $this->getSupportingActorTemplateTokenizer();
    }
}
