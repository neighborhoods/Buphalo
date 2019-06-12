<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Compiler;

use Neighborhoods\Bradfab\Actor;
use Neighborhoods\Bradfab\FabricationFile;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Strategy implements StrategyInterface
{
    use Actor\AwareTrait {
        getActor as public;
    }
    use FabricationFile\SupportingActor\AwareTrait;

    protected $variable_replacement;
    protected $property_replacement;
    protected $property_reference_replacement;
    protected $interface_replacement;
    protected $trait_replacement;
    protected $actor_name_replacement;

    public function getVariableReplacement(): string
    {
        if ($this->variable_replacement === null) {
            $targetActorName = $this->getActor()->getFullPascalCaseName();
            $this->variable_replacement = sprintf('$%s', $targetActorName);
        }

        return $this->variable_replacement;
    }

    public function getPropertyReplacement(): string
    {
        if ($this->property_replacement === null) {
            $propertyReplacement = sprintf(
                'protected $%s',
                $this->getActor()->getFullPascalCaseName()
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
                $this->getActor()->getFullPascalCaseName()
            );
        }

        return $this->property_reference_replacement;
    }

    public function getInterfaceReplacement(): string
    {
        if ($this->interface_replacement === null) {
            $this->interface_replacement = sprintf('%sInterface',
                $this->getActor()->getShortPascalCaseName());
        }

        return $this->interface_replacement;
    }

    public function getTraitReplacement(): string
    {
        if ($this->trait_replacement === null) {
            $this->trait_replacement = sprintf('use %s', $this->getActor()->getFullPascalCaseName());
        }

        return $this->trait_replacement;
    }

    public function getActorShortNameReplacement(): string
    {
        if ($this->actor_name_replacement === null) {
            $fabricationFileActor = $this->getFabricationFileSupportingActor();
            $relativeNamePath = $fabricationFileActor->getRelativeTemplatePath();
            if ($fabricationFileActor->hasAsRelativeTemplatePath()) {
                $relativeNamePath = $fabricationFileActor->getAsRelativeTemplatePath();
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
