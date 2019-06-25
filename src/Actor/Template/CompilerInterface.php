<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

interface CompilerInterface
{
    public function setActorTemplateTokenizer(TokenizerInterface $Tokenizer);

    public function getCompiledContents(): string;
}
