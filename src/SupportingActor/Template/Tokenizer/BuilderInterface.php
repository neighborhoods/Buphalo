<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Tokenizer;

use Rhift\Bradfab\SupportingActor\Template\TokenizerInterface;

interface BuilderInterface
{
    public function build(): TokenizerInterface;

    public function setRecord(array $record): BuilderInterface;
}
