<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template;

use Rhift\Bradfab\SupportingActor;

class Compiler implements CompilerInterface
{
    use SupportingActor\Template\Tokenizer\AwareTrait;
    use SupportingActor\Template\FQCN\Compiler\AwareTrait;
    use SupportingActor\Template\Property\Compiler\AwareTrait;
    use SupportingActor\Template\PropertyReference\Compiler\AwareTrait;
    use SupportingActor\Template\Variable\Compiler\AwareTrait;

    protected $actor_name;
    protected $actor_name_space;
    protected $property_name;
    protected $compiled_contents;

    public function getCompiledContents(): string
    {
        if ($this->compiled_contents === null) {
            $tokenizedContents = $this->getSupportingActorTemplateTokenizer()->getTokenizedContents();

            $compiledTemplateContents = str_replace(
                TokenizerInterface::VARIABLE_TOKEN,
                '$' . $this->getSupportingActorTemplateVariableCompiler()->getCompiledContents(),
                $tokenizedContents
            );
            $compiledTemplateContents = str_replace(
                TokenizerInterface::PROPERTY_TOKEN,
                'protected $' . $this->getSupportingActorTemplatePropertyCompiler()->getCompiledContents(),
                $compiledTemplateContents
            );
            $compiledTemplateContents = str_replace(
                TokenizerInterface::PROPERTY_REFERENCE_TOKEN,
                '$this->' . $this->getSupportingActorTemplatePropertyReferenceCompiler()->getCompiledContents(),
                $compiledTemplateContents
            );
            $compiledTemplateContents = str_replace(
                TokenizerInterface::INTERFACE_TOKEN,
                $this->getSupportingActorTemplateVariableCompiler()->getCompiledContents() . 'Interface',
                $compiledTemplateContents
            );
            $compiledTemplateContents = str_replace(
                TokenizerInterface::METHOD_AND_COMMENT_TOKEN,
                $this->getSupportingActorTemplatePropertyCompiler()->getCompiledContents(),
                $compiledTemplateContents
            );
            $compiledTemplateContents = str_replace(
                TokenizerInterface::NAMESPACE_TOKEN,
                $this->getSupportingActorTemplateFQCNCompiler()->getCompiledContents(),
                $compiledTemplateContents
            );
            $this->compiled_contents = $compiledTemplateContents;
        }

        return $this->compiled_contents;
    }
}
