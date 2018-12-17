<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor;

class Tokenizer implements TokenizerInterface
{
    use SupportingActor\Template\AwareTrait {
        getSupportingActorTemplate as public;
    }
    protected $tokenized_contents;

    public function getTokenizedContents(): string
    {
        if ($this->tokenized_contents === null) {
            $templateContents = $this->getSupportingActorTemplate()->getContents();
            $tokenizedContents = str_replace(
                'Rhift\Bradfab\Template\Actor',
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
                'Actor',
                TokenizerInterface::METHOD_AND_COMMENT_TOKEN,
                $tokenizedContents
            );
            $this->tokenized_contents = $tokenizedContents;
        }

        return $this->tokenized_contents;
    }
}
