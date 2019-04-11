<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Compiler implements CompilerInterface
{
    use Actor\Template\Tokenizer\AwareTrait {
        getTargetActorTemplateTokenizer as public;
    }
    use Actor\Template\Compiler\Strategy\AwareTrait {
        getTargetActorTemplateCompilerStrategy as public;
    }

    protected $CompiledContents;

    public function getCompiledContents(): string
    {
        if ($this->CompiledContents === null) {
            $tokenizedContents = $this->getTargetActorTemplateTokenizer()->getTokenizedContents();
            $variableReplacement = $this->getTargetActorTemplateCompilerStrategy()->getVariableReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_VARIABLE_TOKEN,
                $variableReplacement,
                $tokenizedContents
            );
            $propertyReplacement = $this->getTargetActorTemplateCompilerStrategy()->getPropertyReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_TOKEN,
                $propertyReplacement,
                $compiledContents
            );
            $propertyReferenceReplacement = $this->getTargetActorTemplateCompilerStrategy()->getPropertyReferenceReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_REFERENCE_TOKEN,
                $propertyReferenceReplacement,
                $compiledContents
            );
            $interfaceReplacement = $this->getTargetActorTemplateCompilerStrategy()->getInterfaceReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_INTERFACE_TOKEN,
                $interfaceReplacement,
                $compiledContents
            );
            $traitReplacement = $this->getTargetActorTemplateCompilerStrategy()->getTraitReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_TRAIT_TOKEN,
                $traitReplacement,
                $compiledContents
            );
            $relativeClassPath = $this->getTargetActorTemplateCompilerStrategy()->getTargetPrimaryActor()->getRelativeClassPath();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN,
                $relativeClassPath,
                $compiledContents
            );
            $shortCamelCaseName = $this->getTargetActorTemplateCompilerStrategy()->getTargetPrimaryActor()->getShortCapitalCamelCaseName();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_SHORT_NAME_TOKEN,
                $shortCamelCaseName,
                $compiledContents
            );
            $namespacePrefix = $this->getTargetActorTemplateCompilerStrategy()->getTargetPrimaryActor()->getNamespace();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_NAMESPACE_TOKEN,
                $namespacePrefix,
                $compiledContents
            );
            $fullCapitalCamelCaseName = $this->getTargetActorTemplateCompilerStrategy()->getTargetPrimaryActor()->getFullPascalCaseName();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_FULL_NAME_TOKEN,
                $fullCapitalCamelCaseName,
                $compiledContents
            );
            $actorShortNameReplacement = $this->getTargetActorTemplateCompilerStrategy()->getActorShortNameReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::ACTOR_SHORT_NAME_TOKEN,
                $actorShortNameReplacement,
                $compiledContents
            );
            $this->CompiledContents = $compiledContents;
        }

        return $this->CompiledContents;
    }
}
