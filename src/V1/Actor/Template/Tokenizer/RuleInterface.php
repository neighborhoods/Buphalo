<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\ContextInterface;

interface RuleInterface
{
    public function setTemplateContents(string $TemplateContents);

    public function getTokenizedContents(): string;

    public function setV1ActorTemplateTokenizerRuleContext(ContextInterface $Context);
}
