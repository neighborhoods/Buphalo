<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\Tokenizer;

use Neighborhoods\Buphalo\V2\Actor\Template\TokenizerInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): TokenizerInterface
    {
        return clone $this->getActorTemplateTokenizer();
    }
}
