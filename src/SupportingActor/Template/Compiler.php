<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template;

use Neighborhoods\Bradfab\SupportingActor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
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
            $variableReplacement = $this->getSupportingActorTemplateCompilerStrategy()->getVariableReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_VARIABLE_TOKEN,
                $variableReplacement,
                $tokenizedContents
            );
            $propertyReplacement = $this->getSupportingActorTemplateCompilerStrategy()->getPropertyReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_TOKEN,
                $propertyReplacement,
                $compiledContents
            );
            $propertyReferenceReplacement = $this->getSupportingActorTemplateCompilerStrategy()->getPropertyReferenceReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_REFERENCE_TOKEN,
                $propertyReferenceReplacement,
                $compiledContents
            );
            $interfaceReplacement = $this->getSupportingActorTemplateCompilerStrategy()->getInterfaceReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_INTERFACE_TOKEN,
                $interfaceReplacement,
                $compiledContents
            );
            $traitReplacement = $this->getSupportingActorTemplateCompilerStrategy()->getTraitReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_TRAIT_TOKEN,
                $traitReplacement,
                $compiledContents
            );
            $relativeClassPath = $this->getSupportingActorTemplateCompilerStrategy()->getActor()->getRelativeClassPath();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN,
                $relativeClassPath,
                $compiledContents
            );
            $shortCamelCaseName = $this->getSupportingActorTemplateCompilerStrategy()->getActor()->getShortPascalCaseName();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_SHORT_NAME_TOKEN,
                $shortCamelCaseName,
                $compiledContents
            );
            $namespacePrefix = $this->getSupportingActorTemplateCompilerStrategy()->getActor()->getNamespace();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_NAMESPACE_TOKEN,
                $namespacePrefix,
                $compiledContents
            );
            $fullCapitalCamelCaseName = $this->getSupportingActorTemplateCompilerStrategy()->getActor()->getFullPascalCaseName();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_FULL_NAME_TOKEN,
                $fullCapitalCamelCaseName,
                $compiledContents
            );
            $actorShortNameReplacement = $this->getSupportingActorTemplateCompilerStrategy()->getActorShortNameReplacement();
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
