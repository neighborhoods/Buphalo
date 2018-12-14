<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Tokenizer\Builder;

use Rhift\Bradfab\SupportingActor\Template\Tokenizer\BuilderInterface;

interface FactoryInterface
{
    public function create(): BuilderInterface;
}
