<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor;

class Tokenizer implements TokenizerInterface
{
    use SupportingActor\Template\AwareTrait;
    protected $tokenized_template_contents;

    public function getTokenizedTemplateContents(): string
    {
        if ($this->tokenized_template_contents === null) {
            $templateContents = $this->getTemplate()->getContents();
            $tokenizedTemplateContents = str_replace(
                'Rhift\Bradfab\Template\Actor',
                TokenizerInterface::NAMESPACE_TOKEN,
                $templateContents
            );
            $tokenizedTemplateContents = str_replace(
                'protected $Actor',
                TokenizerInterface::PROPERTY_TOKEN,
                $tokenizedTemplateContents
            );
            $tokenizedTemplateContents = str_replace(
                '$this->Actor',
                TokenizerInterface::PROPERTY_REFERENCE_TOKEN,
                $tokenizedTemplateContents
            );
            $tokenizedTemplateContents = str_replace(
                '$Actor',
                TokenizerInterface::VARIABLE_TOKEN,
                $tokenizedTemplateContents
            );
            $tokenizedTemplateContents = str_replace(
                'ActorInterface',
                TokenizerInterface::INTERFACE_TOKEN,
                $tokenizedTemplateContents
            );
            $tokenizedTemplateContents = str_replace(
                'Actor',
                TokenizerInterface::METHOD_AND_COMMENT_TOKEN,
                $tokenizedTemplateContents
            );
            $this->tokenized_template_contents = $tokenizedTemplateContents;
        }

        return $this->tokenized_template_contents;
    }
}
