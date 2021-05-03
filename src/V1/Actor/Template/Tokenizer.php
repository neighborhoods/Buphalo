<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template;

use Neighborhoods\Buphalo\V1\Actor;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Rule\Builder\RepositoryInterface;

class Tokenizer implements TokenizerInterface
{
    use Actor\Template\Tokenizer\Rule\Builder\Repository\AwareTrait;
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

            $ruleBuilderRepository = $this->getV1ActorTemplateTokenizerRuleBuilderRepository();
            $ruleBuilderMap = $ruleBuilderRepository->getMapByFileExtension(RepositoryInterface::FILE_TYPE_ALL);
            foreach ($ruleBuilderMap as $key => $ruleBuilder) {
                $ruleBuilder->setTemplateContents($templateContents);
                $ruleBuilder->setActor($this->getActor());
                $ruleBuilder->setActorTemplate($this->getActorTemplate());
                $rule = $ruleBuilder->build();
                $tokenizedContents = $rule->getTokenizedContents();
                continue;
            }

            /** @noinspection NotOptimalRegularExpressionsInspection */
            $tokenizedContents = preg_replace(
                '/namespace(\s+)Neighborhoods\\\BuphaloTemplateTree\\\PrimaryActorName/',
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
            /** @noinspection NotOptimalRegularExpressionsInspection */
            $tokenizedContents = preg_replace(
                '/use(\s+)Neighborhoods\\\BuphaloTemplateTree\\\PrimaryActorName/',
                sprintf(
                    'use %s%s\\%s',
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN,
                    TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN
                ),
                $tokenizedContents
            );
            $tokenizedContents = preg_replace(
                '/use(\s+)Neighborhoods\\\BuphaloTemplateTree/',
                sprintf(
                    'use %s',
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN
                ),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            /** @noinspection NotOptimalRegularExpressionsInspection */
            $tokenizedContents = preg_replace(
                '/services:\n(\s+)Neighborhoods\\\BuphaloTemplateTree\\\PrimaryActorName/',
                sprintf(
                    "services:\n  %s%s\\%s",
                    TokenizerInterface::NAMESPACE_PREFIX_TOKEN,
                    TokenizerInterface::NAMESPACE_RELATIVE_TOKEN,
                    TokenizerInterface::PRIMARY_ACTOR_SHORT_PASCAL_CASE_NAME_TOKEN
                ),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            /** @noinspection NotOptimalRegularExpressionsInspection */
            $tokenizedContents = preg_replace(
                '/class:(\s+)Neighborhoods\\\BuphaloTemplateTree\\\PrimaryActorName/',
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
                '[\'@Neighborhoods\BuphaloTemplateTree\PrimaryActorName',
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
                '\PrimaryActorName;',
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
                '\PrimaryActorNameInterface',
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
                '\PrimaryActorName\\',
                sprintf('%s\\', TokenizerInterface::EMPTY_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '\PrimaryActorName',
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
            $tokenizedContents = preg_replace(
                '/protected(\s+)\$PrimaryActorName/',
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
                '$this->PrimaryActorName',
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
                '/class(\s+)PrimaryActorName/',
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
                '$PrimaryActorName',
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
                '/interface(\s+)PrimaryActorNameInterface/',
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
                'PrimaryActorNameInterface',
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
                '/use(\s+)PrimaryActorName/',
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
                "PrimaryActorName\n",
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
                'PrimaryActorName',
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
