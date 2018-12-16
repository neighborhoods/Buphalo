<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler;

use Rhift\Bradfab\TargetActor;

class Strategy implements StrategyInterface
{
    use TargetActor\AwareTrait;

    protected $variable_replacement;
    protected $property_replacement;
    protected $property_reference_replacement;
    protected $interface_replacement;
    protected $method_and_comment_replacement;
    protected $fqcn_replacement;

    public function getVariableReplacement(): string
    {
        if ($this->variable_replacement === null) {
            $targetActorName = $this->getTargetActor()->getShortName();
            $this->variable_replacement = '$' . $targetActorName;
        }

        return $this->variable_replacement;
    }

    public function getPropertyReplacement(): string
    {
        if ($this->property_replacement === null) {
            $this->property_replacement = 'protected $' . $this->getTargetActor()->getName();
        }

        return $this->property_replacement;
    }

    public function getPropertyReferenceReplacement(): string
    {
        if ($this->property_reference_replacement === null) {
            $this->property_reference_replacement = '$this->' . $this->getTargetActor()->getName();
        }

        return $this->property_reference_replacement;
    }

    public function getInterfaceReplacement(): string
    {
        if ($this->interface_replacement === null) {
            $this->interface_replacement = $this->getTargetActor()->getShortName() . 'Interface';
        }

        return $this->interface_replacement;
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
