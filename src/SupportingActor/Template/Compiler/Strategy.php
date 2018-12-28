<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Compiler;

use Neighborhoods\Bradfab\TargetActor;

class Strategy implements StrategyInterface
{
    use TargetActor\AwareTrait {
        getTargetActor as public;
    }

    protected $variable_replacement;
    protected $property_replacement;
    protected $property_reference_replacement;
    protected $interface_replacement;
    protected $trait_replacement;
    protected $method_and_comment_replacement;
    protected $fqcn_replacement;

    public function getVariableReplacement(): string
    {
        if ($this->variable_replacement === null) {
            $targetActorName = $this->getTargetActor()->getShortName();
            $this->variable_replacement = sprintf('$%s', $targetActorName);
        }

        return $this->variable_replacement;
    }

    public function getPropertyReplacement(): string
    {
        if ($this->property_replacement === null) {
            $this->property_replacement = sprintf('protected $%s', $this->getTargetActor()->getName());
        }

        return $this->property_replacement;
    }

    public function getPropertyReferenceReplacement(): string
    {
        if ($this->property_reference_replacement === null) {
            $this->property_reference_replacement = sprintf('$this->%s', $this->getTargetActor()->getName());
        }

        return $this->property_reference_replacement;
    }

    public function getInterfaceReplacement(): string
    {
        if ($this->interface_replacement === null) {
            $this->interface_replacement = sprintf('%sInterface', $this->getTargetActor()->getShortName());
        }

        return $this->interface_replacement;
    }

    public function getTraitReplacement(): string
    {
        if ($this->trait_replacement === null) {
            $this->trait_replacement = sprintf('use %s', $this->getTargetActor()->getShortName());
        }

        return $this->trait_replacement;
    }

    public function getMethodAndCommentReplacement(): string
    {
        if ($this->method_and_comment_replacement === null) {
            $this->method_and_comment_replacement = $this->getTargetActor()->getName();
        }

        return $this->method_and_comment_replacement;
    }

    public function getFQCNReplacement(): string
    {
        if ($this->fqcn_replacement === null) {
            $this->fqcn_replacement = $this->getTargetActor()->getFQCN();
        }

        return $this->fqcn_replacement;
    }
}
