<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map\Map;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\Map\MapInterface;

class Factory implements FactoryInterface
{
    use AwareTrait;

    public function create(): MapInterface
    {
        return $this->getV1ActorTemplateTokenizerRuleBuilderMapMap()->getArrayCopy();
    }
}
