<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Compiler;

use Neighborhoods\Bradfab\TargetPrimaryActor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Strategy implements StrategyInterface
{
    use TargetPrimaryActor\AwareTrait {
        getTargetPrimaryActor as public;
    }

    protected $variable_replacement;
    protected $property_replacement;
    protected $property_reference_replacement;
    protected $interface_replacement;
    protected $trait_replacement;

    public function getVariableReplacement(): string
    {
        if ($this->variable_replacement === null) {
            $targetActorName = $this->getTargetPrimaryActor()->getFullName();
            $this->variable_replacement = sprintf('$%s', $targetActorName);
        }

        return $this->variable_replacement;
    }

    public function getPropertyReplacement(): string
    {
        if ($this->property_replacement === null) {
            $this->property_replacement = sprintf('protected $%s', $this->getTargetPrimaryActor()->getFullName());
        }

        return $this->property_replacement;
    }

    public function getPropertyReferenceReplacement(): string
    {
        if ($this->property_reference_replacement === null) {
            $this->property_reference_replacement = sprintf(
                '$this->%s',
                $this->getTargetPrimaryActor()->getFullName()
            );
        }

        return $this->property_reference_replacement;
    }

    public function getInterfaceReplacement(): string
    {
        if ($this->interface_replacement === null) {
            $this->interface_replacement = sprintf('%sInterface', $this->getTargetPrimaryActor()->getShortName());
        }

        return $this->interface_replacement;
    }

    public function getTraitReplacement(): string
    {
        if ($this->trait_replacement === null) {
            $this->trait_replacement = sprintf('use %s', $this->getTargetPrimaryActor()->getFullName());
        }

        return $this->trait_replacement;
    }
}
