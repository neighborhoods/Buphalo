<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template;

interface CompilerInterface
{
    public function setActorTemplateTokenizer(TokenizerInterface $Tokenizer);

    public function getActorTemplateTokenizer(): TokenizerInterface;

    public function getCompiledContents(): string;
}
