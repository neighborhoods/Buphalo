<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Tokenizer;

use Neighborhoods\Buphalo\Actor\Template\TokenizerInterface;

interface FactoryInterface
{
    public function create(): TokenizerInterface;
}
