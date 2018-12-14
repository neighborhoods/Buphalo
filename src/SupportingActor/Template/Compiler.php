<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor;

class Compiler implements CompilerInterface
{
    use SupportingActor\Template\Tokenizer\AwareTrait;

    protected $actor_name;
    protected $actor_name_space;
    protected $property_name;
    protected $compiled_template_contents;

    public function getCompiledTemplateContents(): string
    {
        if ($this->compiled_template_contents === null) {
            $tokenizedTemplateContents = $this->getTokenizer()->getTokenizedTemplateContents();

            $start = 0;
            $position = strrpos($propertyReplacement, '/');
            if ($position !== false) {
                $start = $position + 1;
            }
            $variableReplacement = trim(substr($propertyReplacement, $start));
            $propertyReplacement = str_replace('/', '', $propertyReplacement);//trim(substr($actorNamePath, $start));

            $supportingActorFileContents = str_replace(
                TokenizerInterface::VARIABLE_TOKEN,
                '$' . $variableReplacement,
                $tokenizedTemplateContents
            );
            $supportingActorFileContents = str_replace(
                TokenizerInterface::PROPERTY_TOKEN,
                'protected $' . $propertyReplacement,
                $supportingActorFileContents
            );
            $supportingActorFileContents = str_replace(
                TokenizerInterface::PROPERTY_REFERENCE_TOKEN,
                '$this->' . $propertyReplacement,
                $supportingActorFileContents
            );
            $supportingActorFileContents = str_replace('Actor', $variableReplacement, $supportingActorFileContents);
            $supportingActorFileContents = str_replace(
                TokenizerInterface::NAMESPACE_TOKEN,
                $actorNamespace,
                $supportingActorFileContents
            );
        }
    }

    public function getActorName(): string
    {
        if ($this->actor_name === null) {
            throw new \LogicException('Compiler actor_name has not been set.');
        }

        return $this->actor_name;
    }

    public function setActorName(string $actor_name): CompilerInterface
    {
        if ($this->actor_name !== null) {
            throw new \LogicException('Compiler actor_name is already set.');
        }

        $this->actor_name = $actor_name;

        return $this;
    }

    public function getActorNameSpace(): string
    {
        if ($this->actor_name_space === null) {
            throw new \LogicException('Compiler actor_name_space has not been set.');
        }

        return $this->actor_name_space;
    }

    public function setActorNameSpace(string $actor_name_space): CompilerInterface
    {
        if ($this->actor_name_space !== null) {
            throw new \LogicException('Compiler actor_name_space is already set.');
        }

        $this->actor_name_space = $actor_name_space;

        return $this;
    }

    public function getPropertyName(): string
    {
        if ($this->property_name === null) {
            throw new \LogicException('Compiler property_name has not been set.');
        }

        return $this->property_name;
    }

    public function setPropertyName(string $property_name): CompilerInterface
    {
        if ($this->property_name !== null) {
            throw new \LogicException('Compiler property_name is already set.');
        }

        $this->property_name = $property_name;

        return $this;
    }
}
