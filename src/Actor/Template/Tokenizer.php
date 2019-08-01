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
                TokenizerInterface::PRIMARY_ACTOR_NAMESPACE_TOKEN,
                $templateContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'Template\Actor',
                TokenizerInterface::PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'Template\Actor\\',
                sprintf('%s\\', TokenizerInterface::PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'Template',
                TokenizerInterface::PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'protected $Actor',
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '$this->Actor',
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_REFERENCE_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                '$Actor',
                TokenizerInterface::PRIMARY_ACTOR_VARIABLE_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'ActorInterface',
                TokenizerInterface::PRIMARY_ACTOR_INTERFACE_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'use Actor',
                TokenizerInterface::PRIMARY_ACTOR_TRAIT_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                sprintf('%s', $this->getActor()->getShortPascalCaseName()),
                TokenizerInterface::ACTOR_SHORT_NAME_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                "Actor\n",
                sprintf('%s%s', TokenizerInterface::PRIMARY_ACTOR_SHORT_NAME_TOKEN, "\n"),
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'Actor',
                TokenizerInterface::PRIMARY_ACTOR_FULL_NAME_TOKEN,
                $tokenizedContents
            );
            $this->getActorTemplate()->applyTokenizedContents($tokenizedContents);
            $this->TokenizedContents = $this->getActorTemplate()->getContents();
        }

        return $this->TokenizedContents;
    }
}
