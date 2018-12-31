<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template;

use Neighborhoods\Bradfab\TargetActor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Compiler implements CompilerInterface
{
    use TargetActor\Template\Tokenizer\AwareTrait {
        getTargetActorTemplateTokenizer as public;
    }
    use TargetActor\Template\Compiler\Strategy\AwareTrait {
        getTargetActorTemplateCompilerStrategy as public;
    }

    protected $CompiledContents;

    public function getCompiledContents(): string
    {
        if ($this->CompiledContents === null) {
            $tokenizedContents = $this->getTargetActorTemplateTokenizer()->getTokenizedContents();

            $compiledContents = str_replace(
                TokenizerInterface::VARIABLE_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getVariableReplacement(),
                $tokenizedContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PROPERTY_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getPropertyReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PROPERTY_REFERENCE_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getPropertyReferenceReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::INTERFACE_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getInterfaceReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::TRAIT_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getTraitReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::METHOD_AND_COMMENT_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getMethodAndCommentReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::FQCN_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getFQCNReplacement(),
                $compiledContents
            );
            $this->CompiledContents = $compiledContents;
        }

        return $this->CompiledContents;
    }
}
