<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule;

interface BuilderInterface extends Rule\BuilderInterface
{
    public const OPTION_SEARCH = 'rule.search';
    public const OPTION_REPLACE = 'rule.replace';

    public function setOptions(array $options): BuilderInterface;
}
