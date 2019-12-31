<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplaceInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): StrReplaceInterface
    {
        return clone $this->getV1ActorTemplateTokenizerRuleStrReplace();
    }
}
