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
                'Neighborhoods\BradfabTemplateTree',
                TokenizerInterface::NAMESPACE_TOKEN,
                $templateContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '\ActorInterface',
                sprintf('\%s', TokenizerInterface::RELATIVE_CLASS_PATH_TOKEN),
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
                '\Actor\\',
                sprintf('\\%s\\', TokenizerInterface::RELATIVE_CLASS_PATH_TOKEN),
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
                sprintf('protected $%s', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '$this->Actor',
                sprintf('$this->%s', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '$Actor',
                sprintf('$%s', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'interface ActorInterface',
                sprintf('interface %s', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'ActorInterface',
                sprintf('%sInterface', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'use Actor',
                sprintf('use %s', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN),
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
                sprintf('%s%s', TokenizerInterface::SHORT_PASCAL_CASE_NAME_TOKEN, "\n"),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'Actor',
                TokenizerInterface::FULL_PASCAL_CASE_NAME_TOKEN,
                $tokenizedContents
            );
            $this->getActorTemplate()->applyTokenizedContents($tokenizedContents);
            $this->TokenizedContents = $this->getActorTemplate()->getTokenizedContents();
        }

        return $this->TokenizedContents;
    }
}
