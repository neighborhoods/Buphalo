<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Compiler implements CompilerInterface
{
    use Actor\Template\Tokenizer\AwareTrait {
        getActorTemplateTokenizer as public;
    }
    use Actor\Template\Compiler\Strategy\AwareTrait {
        getActorTemplateCompilerStrategy as public;
    }

    protected $CompiledContents;

    public function getCompiledContents(): string
    {
        if ($this->CompiledContents === null) {
            $tokenizedContents = $this->getActorTemplateTokenizer()->getTokenizedContents();
            $variableReplacement = $this->getActorTemplateCompilerStrategy()->getVariableReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_VARIABLE_TOKEN,
                $variableReplacement,
                $tokenizedContents
            );
            $propertyReplacement = $this->getActorTemplateCompilerStrategy()->getPropertyReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_TOKEN,
                $propertyReplacement,
                $compiledContents
            );
            $propertyReferenceReplacement = $this->getActorTemplateCompilerStrategy()->getPropertyReferenceReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_PROPERTY_REFERENCE_TOKEN,
                $propertyReferenceReplacement,
                $compiledContents
            );
            $interfaceReplacement = $this->getActorTemplateCompilerStrategy()->getInterfaceReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_INTERFACE_TOKEN,
                $interfaceReplacement,
                $compiledContents
            );
            $traitReplacement = $this->getActorTemplateCompilerStrategy()->getTraitReplacement();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_TRAIT_TOKEN,
                $traitReplacement,
                $compiledContents
            );
            $relativeClassPath = $this->getActorTemplateCompilerStrategy()->getActor()->getRelativeClassPath();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_RELATIVE_NAME_PATH_TOKEN,
                $relativeClassPath,
                $compiledContents
            );
            $shortCamelCaseName = $this->getActorTemplateCompilerStrategy()->getActor()->getShortPascalCaseName();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_SHORT_NAME_TOKEN,
                $shortCamelCaseName,
                $compiledContents
            );
            $namespacePrefix = $this->getActorTemplateCompilerStrategy()->getActor()->getNamespace();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_NAMESPACE_TOKEN,
                $namespacePrefix,
                $compiledContents
            );
            $fullCapitalCamelCaseName = $this->getActorTemplateCompilerStrategy()->getActor()->getFullPascalCaseName();
            $compiledContents = str_replace(
                TokenizerInterface::PRIMARY_ACTOR_FULL_NAME_TOKEN,
                $fullCapitalCamelCaseName,
                $compiledContents
            );
            $actorShortNameReplacement = $this->getActorTemplateCompilerStrategy()->getActorShortNameReplacement();
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
