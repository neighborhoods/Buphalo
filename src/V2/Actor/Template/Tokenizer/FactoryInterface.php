<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\Tokenizer;

use Neighborhoods\Buphalo\V2\Actor\Template\TokenizerInterface;

interface FactoryInterface
{
    public function create(): TokenizerInterface;
}
