<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler;

use Neighborhoods\Bradfab\Actor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Strategy implements StrategyInterface
{
    use Actor\AwareTrait;

    protected $VariableReplacement;
    protected $PropertyReplacement;
    protected $PropertyReferenceReplacement;
    protected $InterfaceReplacement;
    protected $TraitReplacement;
    protected $ActorNameReplacement;

    public function getVariableReplacement(): string
    {
        if ($this->VariableReplacement === null) {
            $targetActorName = $this->getActor()->getFullPascalCaseName();
            $this->VariableReplacement = sprintf('$%s', $targetActorName);
        }

        return $this->VariableReplacement;
    }

    public function getPropertyReplacement(): string
    {
        if ($this->PropertyReplacement === null) {
            $propertyReplacement = sprintf(
                'protected $%s',
                $this->getActor()->getFullPascalCaseName()
            );
            $this->PropertyReplacement = $propertyReplacement;
        }

        return $this->PropertyReplacement;
    }

    public function getPropertyReferenceReplacement(): string
    {
        if ($this->PropertyReferenceReplacement === null) {
            $this->PropertyReferenceReplacement = sprintf(
                '$this->%s',
                $this->getActor()->getFullPascalCaseName()
            );
        }

        return $this->PropertyReferenceReplacement;
    }

    public function getInterfaceReplacement(): string
    {
        if ($this->InterfaceReplacement === null) {
            $this->InterfaceReplacement = sprintf('%sInterface',
                $this->getActor()->getShortPascalCaseName());
        }

        return $this->InterfaceReplacement;
    }

    public function getTraitReplacement(): string
    {
        if ($this->TraitReplacement === null) {
            $this->TraitReplacement = sprintf('use %s', $this->getActor()->getFullPascalCaseName());
        }

        return $this->TraitReplacement;
    }

    public function getActorShortNameReplacement(): string
    {
        if ($this->ActorNameReplacement === null) {
            $fabricationFileActor = $this->getFabricationFileActor();
            $relativeNamePath = $fabricationFileActor->getGenerateRelativeDirectoryPath();
            if ($fabricationFileActor->hasTemplateRelativeDirectoryPath()) {
                $relativeNamePath = $fabricationFileActor->getTemplateRelativeDirectoryPath();
            }
            $start = 0;
            $position = strrpos($relativeNamePath, '/');
            if ($position !== false) {
                $start = $position + 1;
            }
            $shortName = trim(substr($relativeNamePath, $start));
            $this->ActorNameReplacement = $shortName;
        }

        return $this->ActorNameReplacement;
    }
}
