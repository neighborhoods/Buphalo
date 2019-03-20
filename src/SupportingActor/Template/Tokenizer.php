<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template;

use Neighborhoods\Bradfab\SupportingActor;

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
                'Neighborhoods\Bradfab\Template\Actor',
                TokenizerInterface::FQCN_TOKEN,
                $templateContents
            );
            $tokenizedContents = str_replace(
                'protected $Actor',
                TokenizerInterface::PROPERTY_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                '$this->Actor',
                TokenizerInterface::PROPERTY_REFERENCE_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                '$Actor',
                TokenizerInterface::VARIABLE_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                'ActorInterface',
                TokenizerInterface::INTERFACE_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                'use Actor',
                TokenizerInterface::TRAIT_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                'ACTOR',
                TokenizerInterface::CONSTANT_TOKEN,
                $tokenizedContents
            );
            $tokenizedContents = str_replace(
                'Actor',
                TokenizerInterface::METHOD_AND_COMMENT_TOKEN,
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
