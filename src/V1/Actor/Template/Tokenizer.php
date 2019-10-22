<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template;

use Neighborhoods\Buphalo\V1\Actor;

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
            $templateContents = $this->getActorTemplate()->getTokenizedContents();
            $tokenizedContents = preg_replace(
                '/namespace(\s+)Neighborhoods\\\BuphaloTemplateTree\\\Actor/',
                sprintf(
                    'namespace %s%s\\%s',
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN,
                    TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN
                ),
                $templateContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                '/namespace(\s+)Neighborhoods\\\BuphaloTemplateTree/',
                sprintf(
                    'namespace %s%s',
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN
                ),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                '/use(\s+)Neighborhoods\\\BuphaloTemplateTree\\\Actor/',
                sprintf(
                    'use %s%s\\%s',
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN,
                    TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN
                ),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                '/services:\n(\s+)Neighborhoods\\\BuphaloTemplateTree\\\Actor/',
                sprintf(
                    "services:\n  %s%s\\%s",
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN,
                    TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN
                ),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                '/class:(\s+)Neighborhoods\\\BuphaloTemplateTree\\\Actor/',
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
                '[\'@Neighborhoods\BuphaloTemplateTree\Actor',
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
                sprintf('\%s;', $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()),
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
                sprintf('\%sInterface', $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()),
                sprintf('\%sInterface', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN),
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
                sprintf('\%s', $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()),
                sprintf('\%s', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN),
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
                '\\Template',
                TokenizerInterface::RELATIVE_CLASS_PATH_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                '/protected(\s+)\$Actor/',
                sprintf('protected $%s', TokenizerInterface::PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                sprintf(
                    '/protected(\s+)\$%s/',
                    $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()
                ),
                sprintf('protected $%s', TokenizerInterface::PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '$this->Actor',
                sprintf('$this->%s', TokenizerInterface::PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                sprintf('$this->%s', $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()),
                sprintf('$this->%s', TokenizerInterface::PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                '/class(\s+)Actor/',
                sprintf('class %s', TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                sprintf('/class(\s+)%s/', $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()),
                sprintf('class %s', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN),
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
                sprintf('$%s', $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()),
                sprintf('$%s', TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                '/interface(\s+)ActorInterface/',
                sprintf('interface %sInterface', TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                sprintf(
                    '/interface(\s+)%s/',
                    $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()
                ),
                sprintf('interface %s', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN),
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
                sprintf('%sInterface', $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()),
                sprintf('%sInterface', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                '/use(\s+)Actor/',
                sprintf('use %s', TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = preg_replace(
                sprintf('/use(\s+)%s/', $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()),
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
                sprintf("%s\n", $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()),
                sprintf('%s%s', TokenizerInterface::PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN, "\n"),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'Actor',
                TokenizerInterface::PRIMARY_ACTOR_FULL_PASCAL_CASE_NAME_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                sprintf('%s', $this->getActorTemplate()->getFabricationFileActor()->getTemplateFileName()),
                TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN,
                $tokenizedContents
            );
            $this->getActorTemplate()->applyTokenizedContents($tokenizedContents);
            $this->TokenizedContents = $this->getActorTemplate()->getTokenizedContents();
        }

        return $this->TokenizedContents;
    }
}
