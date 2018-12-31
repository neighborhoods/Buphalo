<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Tokenizer;

use Neighborhoods\Bradfab\TargetActor\Template\TokenizerInterface;

interface FactoryInterface
{
    public function create(): TokenizerInterface;
}
