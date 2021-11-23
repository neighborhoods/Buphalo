<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template;

use Neighborhoods\Buphalo\V2\Actor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */ // PhpStorm doesn't recognize visibility override
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

            $actor = $this->getActorTemplateTokenizer()->getActor();

            $replacements = [
                TokenizerInterface::TOKEN_NAMESPACE_PREFIX => $actor->getNamespacePrefix(),
                TokenizerInterface::TOKEN_NAMESPACE_RELATIVE => $actor->getNamespaceRelative(),
                TokenizerInterface::TOKEN_PRIMARY_ACTOR_NAME_FULL_PASCAL => $actor->getPrimaryActorFullPascalCaseName(),
                TokenizerInterface::TOKEN_PRIMARY_ACTOR_NAME_SHORT_PASCAL =>
                    $actor->getPrimaryActorShortPascalCaseName(),
            ];

            $compiledContents = str_replace(
                array_keys($replacements),
                array_values($replacements),
                $tokenizedContents
            );

            $this->CompiledContents = $compiledContents;
        }

        return $this->CompiledContents;
    }
}
