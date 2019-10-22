<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer;

use Neighborhoods\Buphalo\V1\Actor\Template\TokenizerInterface;

interface FactoryInterface
{
    public function create(): TokenizerInterface;
}
