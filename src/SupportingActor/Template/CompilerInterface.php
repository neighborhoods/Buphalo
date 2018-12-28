<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template;

use Neighborhoods\Bradfab\SupportingActor\Template\Compiler\StrategyInterface;

interface CompilerInterface
{
    public function setSupportingActorTemplateTokenizer(TokenizerInterface $Tokenizer);

    public function getSupportingActorTemplateTokenizer(): TokenizerInterface;

    public function setSupportingActorTemplateCompilerStrategy(StrategyInterface $Strategy);

    public function getSupportingActorTemplateCompilerStrategy(): StrategyInterface;

    public function getCompiledContents(): string;
}
