<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getV1ActorTemplateTokenizerRuleBuilderMap()->getArrayCopy();
    }
}
