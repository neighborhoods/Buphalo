<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor;

class Compiler implements CompilerInterface
{
    use Actor\Template\Tokenizer\AwareTrait {
        getActorTemplateTokenizer as public;
    }

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
            /** @noinspection CascadeStringReplacementInspection */
            $compiledContents = str_replace(
                TokenizerInterface::FULL_PASCAL_CASE_NAME_TOKEN,
                $this->getActorTemplateTokenizer()->getActor()->getFullPascalCaseName(),
                $compiledContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $compiledContents = str_replace(
                TokenizerInterface::RELATIVE_CLASS_PATH_TOKEN,
                $this->getActorTemplateTokenizer()->getActor()->getRelativeClassPath(),
                $compiledContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $compiledContents = str_replace(
                TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                $this->getActorTemplateTokenizer()->getActor()->getNamespacePrefix(),
                $compiledContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $compiledContents = str_replace(
                TokenizerInterface::NAMESPACE_RELATIVE_TOKEN,
                $this->getActorTemplateTokenizer()->getActor()->getNamespaceRelative(),
                $compiledContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN,
                $this->getActorTemplateTokenizer()->getActor()->getPrimaryActorFullPascalCaseName(),
                $compiledContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN,
                $this->getActorTemplateTokenizer()->getActor()->getPrimaryActorShortPascalCaseName(),
                $compiledContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $compiledContents = str_replace(
                TokenizerInterface::EMPTY_TOKEN,
                '',
                $compiledContents
            );
            $this->CompiledContents = $compiledContents;
        }

        return $this->CompiledContents;
    }
}
