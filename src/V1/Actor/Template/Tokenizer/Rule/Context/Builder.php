<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Context;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\ContextInterface;
use Neighborhoods\Buphalo\V1;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use V1\Actor\AwareTrait;
    use V1\Actor\Template\AwareTrait;

    protected $record;

    public function build(): ContextInterface
    {
        $Context = $this->getV1ActorTemplateTokenizerRuleContextFactory()->create();
        $Context->setActor($this->getActor());
        $Context->setActorTemplate($this->getActorTemplate());

        return $Context;
    }
}
