<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template;

use Neighborhoods\Bradfab\SupportingActor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Tokenizer implements TokenizerInterface
{
    use SupportingActor\Template\AwareTrait {
        getSupportingActorTemplate as public;
    }
    use SupportingActor\Template\AnnotationTokenizer\Factory\AwareTrait;

    protected $tokenized_contents;
    protected $annotation_tokenizer;

    public function tokenize(): TokenizerInterface
    {
        $this->getAnnotationTokenizer();

        return $this;
    }

    public function getTokenizedContents(): string
    {
        if ($this->tokenized_contents === null) {

            $this->getAnnotationTokenizer()->tokenize();
            $templateContents = $this->getSupportingActorTemplate()->getContents();
            $tokenizedContents = str_replace(
                'Neighborhoods\Bradfab',
                TokenizerInterface::PRIMARY_ACTOR_NAMESPACE_TOKEN,
                $templateContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'Template\SupportingActor',
                TokenizerInterface::PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN,
                $tokenizedContents
            );
            /** @noinspection CascadeStringReplacementInspection */
            $tokenizedContents = str_replace(
                'Template\SupportingActor\\',
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
                sprintf('%s', $this->getSupportingActorTemplate()->getPascalCaseName()),
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
            $this->getSupportingActorTemplate()->updateContents($tokenizedContents);
            $this->tokenized_contents = $this->getSupportingActorTemplate()->getContents();
        }

        return $this->tokenized_contents;
    }

    protected function getAnnotationTokenizer(): AnnotationTokenizerInterface
    {
        if ($this->annotation_tokenizer === null) {
            $annotationTokenizer = $this->getSupportingActorTemplateAnnotationTokenizerFactory()->create();
            $annotationTokenizer->setSupportingActorTemplate($this->getSupportingActorTemplate());
            $this->annotation_tokenizer = $annotationTokenizer;
        }

        return $this->annotation_tokenizer;
    }
}
