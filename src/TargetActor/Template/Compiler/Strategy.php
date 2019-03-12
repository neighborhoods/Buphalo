<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Compiler;

use Neighborhoods\Bradfab\TargetPrimaryActor;
use \Neighborhoods\Bradfab\FabricationFile;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Strategy implements StrategyInterface
{
    use TargetPrimaryActor\AwareTrait {
        getTargetPrimaryActor as public;
    }
    use FabricationFile\Actor\AwareTrait;

    protected $variable_replacement;
    protected $property_replacement;
    protected $property_reference_replacement;
    protected $interface_replacement;
    protected $trait_replacement;
    protected $actor_name_replacement;

    public function getVariableReplacement(): string
    {
        if ($this->variable_replacement === null) {
            $targetActorName = $this->getTargetPrimaryActor()->getFullCapitalCamelCaseName();
            $this->variable_replacement = sprintf('$%s', $targetActorName);
        }

        return $this->variable_replacement;
    }

    public function getPropertyReplacement(): string
    {
        if ($this->property_replacement === null) {
            $propertyReplacement = sprintf(
                'protected $%s',
                $this->getTargetPrimaryActor()->getFullCapitalCamelCaseName()
            );
            $this->property_replacement = $propertyReplacement;
        }

        return $this->property_replacement;
    }

    public function getPropertyReferenceReplacement(): string
    {
        if ($this->property_reference_replacement === null) {
            $this->property_reference_replacement = sprintf(
                '$this->%s',
                $this->getTargetPrimaryActor()->getFullCapitalCamelCaseName()
            );
        }

        return $this->property_reference_replacement;
    }

    public function getInterfaceReplacement(): string
    {
        if ($this->interface_replacement === null) {
            $this->interface_replacement = sprintf('%sInterface',
                $this->getTargetPrimaryActor()->getShortCapitalCamelCaseName());
        }

        return $this->interface_replacement;
    }

    public function getTraitReplacement(): string
    {
        if ($this->trait_replacement === null) {
            $this->trait_replacement = sprintf('use %s', $this->getTargetPrimaryActor()->getFullCapitalCamelCaseName());
        }

        return $this->trait_replacement;
    }

    public function getActorShortNameReplacement(): string
    {
        if ($this->actor_name_replacement === null) {
            $fabricationFileActor = $this->getFabricationFileActor();
            $relativeNamePath = $fabricationFileActor->getRelativeTemplatePath();
            if ($fabricationFileActor->hasLooksLikeRelativeTemplatePath()) {
                $relativeNamePath = $fabricationFileActor->getLooksLikeRelativeTemplatePath();
            }
            $start = 0;
            $position = strrpos($relativeNamePath, '/');
            if ($position !== false) {
                $start = $position + 1;
            }
            $shortName = trim(substr($relativeNamePath, $start));
            $this->actor_name_replacement = $shortName;
        }

        return $this->actor_name_replacement;
    }
}
