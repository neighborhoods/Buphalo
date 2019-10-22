<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer;

use Neighborhoods\Buphalo\V1\Actor\Template\TokenizerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TokenizerInterface
    {
        return clone $this->getActorTemplateTokenizer();
    }
}
