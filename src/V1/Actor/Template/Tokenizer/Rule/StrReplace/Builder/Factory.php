<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace\Builder;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\BuilderInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): BuilderInterface
    {
        return clone $this->getV1ActorTemplateTokenizerRuleStrReplaceBuilder();
    }
}
