<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Tokenizer;

use Rhift\Bradfab\SupportingActor\Template\TokenizerInterface;

interface FactoryInterface
{
    public function create(): TokenizerInterface;
}
