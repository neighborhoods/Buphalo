<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Tokenizer;

use Neighborhoods\Bradfab\SupportingActor\Template\TokenizerInterface;

interface FactoryInterface
{
    public function create(): TokenizerInterface;
}
