<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\PregReplace;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;

interface BuilderInterface extends Rule\BuilderInterface
{
    public const OPTION_PATTERN = 'rule.pattern';
    public const OPTION_REPLACEMENT = 'rule.replacement';

    public function setOptions(array $options): BuilderInterface;
}
