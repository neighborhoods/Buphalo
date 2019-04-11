<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Tokenizer;

use Neighborhoods\Bradfab\Actor\Template\TokenizerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TokenizerInterface
    {
        return clone $this->getTargetActorTemplateTokenizer();
    }
}
