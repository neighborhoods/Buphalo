<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor;

class Compiler implements CompilerInterface
{
    use SupportingActor\Template\Tokenizer\AwareTrait {
        getSupportingActorTemplateTokenizer as public;
    }
    use SupportingActor\Template\Compiler\Strategy\AwareTrait {
        getSupportingActorTemplateCompilerStrategy as public;
    }
    protected $CompiledContents;

    public function getCompiledContents(): string
    {
        if ($this->CompiledContents === null) {
            $tokenizedContents = $this->getSupportingActorTemplateTokenizer()->getTokenizedContents();

            $compiledContents = str_replace(
                TokenizerInterface::VARIABLE_TOKEN,
                $this->getSupportingActorTemplateCompilerStrategy()->getVariableReplacement(),
                $tokenizedContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PROPERTY_TOKEN,
                $this->getSupportingActorTemplateCompilerStrategy()->getPropertyReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PROPERTY_REFERENCE_TOKEN,
                $this->getSupportingActorTemplateCompilerStrategy()->getPropertyReferenceReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::INTERFACE_TOKEN,
                $this->getSupportingActorTemplateCompilerStrategy()->getInterfaceReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::TRAIT_TOKEN,
                $this->getSupportingActorTemplateCompilerStrategy()->getTraitReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::METHOD_AND_COMMENT_TOKEN,
                $this->getSupportingActorTemplateCompilerStrategy()->getMethodAndCommentReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::FQCN_TOKEN,
                $this->getSupportingActorTemplateCompilerStrategy()->getFQCNReplacement(),
                $compiledContents
            );
            $this->CompiledContents = $compiledContents;
        }

        return $this->CompiledContents;
    }
}
