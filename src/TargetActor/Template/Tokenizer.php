<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template;

use Neighborhoods\Bradfab\TargetActor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Tokenizer implements TokenizerInterface
{
    use TargetActor\Template\AwareTrait {
        getTargetActorTemplate as public;
    }
    use TargetActor\Template\AnnotationTokenizer\Factory\AwareTrait;

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
            $templateContents = $this->getTargetActorTemplate()->getContents();
            $tokenizedContents = str_replace(
                'Neighborhoods\Bradfab',
                TokenizerInterface::PRIMARY_ACTOR_NAMESPACE_TOKEN,
                $templateContents
            );
            $tokenizedContents = str_replace(
                'Template\Actor',
                TokenizerInterface::PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                'Template\Actor\\',
                sprintf('%s\\', TokenizerInterface::PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN),
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                'Template',
                TokenizerInterface::PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                'protected $Actor',
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                '$this->Actor',
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_REFERENCE_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                '$Actor',
                TokenizerInterface::PRIMARY_ACTOR_VARIABLE_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                'ActorInterface',
                TokenizerInterface::PRIMARY_ACTOR_INTERFACE_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                'use Actor',
                TokenizerInterface::PRIMARY_ACTOR_TRAIT_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                sprintf('%s', $this->getTargetActorTemplate()->getShortName()),
                TokenizerInterface::ACTOR_SHORT_NAME_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                "Actor\n",
                sprintf('%s%s', TokenizerInterface::PRIMARY_ACTOR_SHORT_NAME_TOKEN, "\n"),
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                'Actor',
                TokenizerInterface::PRIMARY_ACTOR_FULL_NAME_TOKEN,
                $tokenizedContents
            );
            $this->getTargetActorTemplate()->updateContents($tokenizedContents);
            $this->tokenized_contents = $this->getTargetActorTemplate()->getContents();
        }

        return $this->tokenized_contents;
    }

    protected function getAnnotationTokenizer(): AnnotationTokenizerInterface
    {
        if ($this->annotation_tokenizer === null) {
            $annotationTokenizer = $this->getTargetActorTemplateAnnotationTokenizerFactory()->create();
            $annotationTokenizer->setTargetActorTemplate($this->getTargetActorTemplate());
            $this->annotation_tokenizer = $annotationTokenizer;
        }

        return $this->annotation_tokenizer;
    }
}
