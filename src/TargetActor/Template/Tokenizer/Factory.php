<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Tokenizer;

use Neighborhoods\Bradfab\TargetActor\Template\TokenizerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TokenizerInterface
    {
        return clone $this->getTargetActorTemplateTokenizer();
    }
}
