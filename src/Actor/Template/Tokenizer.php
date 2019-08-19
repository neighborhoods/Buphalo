<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Tokenizer implements TokenizerInterface
{
    use Actor\Template\AwareTrait;
    use Actor\Template\AnnotationTokenizer\AwareTrait;
    use Actor\AwareTrait {
        getActor as public;
    }

    protected $TokenizedContents;

    public function tokenize(): TokenizerInterface
    {
        $this->getTokenizedContents();

        return $this;
    }

    public function getTokenizedContents(): string
    {
        if ($this->TokenizedContents === null) {

            $this->getActorTemplateAnnotationTokenizer()->tokenize();
            $templateContents = $this->getActorTemplate()->getContents();
            $tokenizedContents = str_replace(
                'namespace Neighborhoods\\BradfabTemplateTree\\Actor',
                sprintf(
                    'namespace %s%s\\%s',
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN,
                    TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN
                ),
                $templateContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'namespace Neighborhoods\\BradfabTemplateTree',
                sprintf(
                    'namespace %s%s',
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN
                ),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'use Neighborhoods\BradfabTemplateTree\Actor',
                sprintf(
                    'use %s%s\\%s',
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN,
                    TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN
                ),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                "services:\n  Neighborhoods\BradfabTemplateTree\Actor",
                sprintf(
                    "services:\n  %s%s\\%s",
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN,
                    TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN
                ),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'class: Neighborhoods\BradfabTemplateTree\Actor',
                sprintf(
                    'class: %s%s\\%s',
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN,
                    TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN
                ),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '[\'@Neighborhoods\BradfabTemplateTree\Actor',
                sprintf(
                    '[\'@%s%s\\%s',
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN,
                    TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN
                ),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '\Actor;',
                sprintf('%s;', TokenizerInterface::EMPTY_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '\ActorInterface',
                sprintf('\%sInterface', TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '\Actor\\',
                sprintf('%s\\', TokenizerInterface::EMPTY_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '\Actor',
                sprintf('\%s', TokenizerInterface::RELATIVE_CLASS_PATH_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'Template',
                TokenizerInterface::RELATIVE_CLASS_PATH_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'protected $Actor',
                sprintf('protected $%s', TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '$this->Actor',
                sprintf('$this->%s', TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '$Actor',
                sprintf('$%s', TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'interface ActorInterface',
                sprintf('interface %sInterface', TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'ActorInterface',
                sprintf('%sInterface', TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'use Actor',
                sprintf('use %s', TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                sprintf('%s', $this->getActor()->getShortPascalCaseName()),
                TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                "Actor\n",
                sprintf('%s%s', TokenizerInterface::PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN, "\n"),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'Actor',
                TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN,
                $tokenizedContents
            );
            $this->getActorTemplate()->applyTokenizedContents($tokenizedContents);
            $this->TokenizedContents = $this->getActorTemplate()->getTokenizedContents();
        }

        return $this->TokenizedContents;
    }
}
