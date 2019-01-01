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
                TokenizerInterface::PRIMARY_ACTOR_VARIABLE_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getVariableReplacement(),
                $tokenizedContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getPropertyReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_REFERENCE_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getPropertyReferenceReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_INTERFACE_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getInterfaceReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_TRAIT_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getTraitReplacement(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getTargetPrimaryActor()->getRelativeNamePath(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_SHORT_NAME_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getTargetPrimaryActor()->getShortName(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_NAMESPACE_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getTargetPrimaryActor()->getNamespace(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_FULL_NAME_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getTargetPrimaryActor()->getFullName(),
                $compiledContents
            );
            $compiledContents = str_replace(
                TokenizerInterface::ACTOR_SHORT_NAME_TOKEN,
                $this->getTargetActorTemplateCompilerStrategy()->getTargetPrimaryActor()->getFullName(),
                $compiledContents
            );
            $this->CompiledContents = $compiledContents;
        }

        return $this->CompiledContents;
    }
}
