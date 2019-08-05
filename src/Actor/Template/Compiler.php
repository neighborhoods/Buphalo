<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Compiler implements CompilerInterface
{
    use Actor\Template\Tokenizer\AwareTrait {
        getActorTemplateTokenizer as public;
    }
    use Actor\Template\Compiler\Strategy\AwareTrait;

    protected $CompiledContents;

    public function getCompiledContents(): string
    {
        if ($this->CompiledContents === null) {
            $tokenizedContents = $this->getActorTemplateTokenizer()->getTokenizedContents();
            $compiledContents = str_replace(
                TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN,
                $this->getActorTemplateTokenizer()->getActor()->getShortPascalCaseName(),
                $tokenizedContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::FULL_PASCAL_CASE_NAME_TOKEN,
                $this->getActorTemplateTokenizer()->getActor()->getFullPascalCaseName(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::RELATIVE_CLASS_PATH_TOKEN,
                $this->getActorTemplateTokenizer()->getActor()->getRelativeClassPath(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::NAMESPACE_TOKEN,
                $this->getActorTemplateTokenizer()->getActor()->getNamespace(),
                $compiledContents
            );
            $this->CompiledContents = $compiledContents;
        }

        return $this->CompiledContents;
    }
}
