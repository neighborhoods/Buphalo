<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace\Map;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\ContextInterface;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace\MapInterface;

interface BuilderInterface
{
    public function build(): MapInterface;

    public function addInstruction(array $instruction): BuilderInterface;

    public function setV1ActorTemplateTokenizerRuleContext(ContextInterface $Context);
}

