<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplaceInterface;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;

interface BuilderInterface extends Rule\BuilderInterface
{
    public const DEFINITION_KEY_SEARCH = 'builder.definition.search';
    public const DEFINITION_KEY_REPLACE = 'builder.definition.replace';

    public function build(): StrReplaceInterface;

    public function setRuleDefinition(array $ruleDefinition): BuilderInterface;
}
