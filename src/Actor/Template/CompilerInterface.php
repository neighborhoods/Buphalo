<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor\Template\Compiler\StrategyInterface;

interface CompilerInterface
{
    public function setActorTemplateTokenizer(TokenizerInterface $Tokenizer);

    public function getActorTemplateTokenizer(): TokenizerInterface;

    public function setActorTemplateCompilerStrategy(StrategyInterface $Strategy);

    public function getActorTemplateCompilerStrategy(): StrategyInterface;

    public function getCompiledContents(): string;
}
