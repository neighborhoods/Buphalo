<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template;

use Neighborhoods\Bradfab\TargetActor\Template\Compiler\StrategyInterface;

interface CompilerInterface
{
    public function setTargetActorTemplateTokenizer(TokenizerInterface $Tokenizer);

    public function getTargetActorTemplateTokenizer(): TokenizerInterface;

    public function setTargetActorTemplateCompilerStrategy(StrategyInterface $Strategy);

    public function getTargetActorTemplateCompilerStrategy(): StrategyInterface;

    public function getCompiledContents(): string;
}
