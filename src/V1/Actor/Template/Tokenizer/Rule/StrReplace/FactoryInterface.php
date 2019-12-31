<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplace;

use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\StrReplaceInterface;

interface FactoryInterface
{
    public function create(): StrReplaceInterface;
}
