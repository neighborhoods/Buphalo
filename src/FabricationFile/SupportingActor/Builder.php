<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor;

use Rhift\Bradfab\FabricationFile\SupportingActorInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $record;

    public function build(): SupportingActorInterface
    {
        $record = $this->getRecord();
        $supportingActor = $this->getFabricationFileSupportingActorFactory()->create();
        $templateFileExtension = sprintf(
            '.%s',
            pathinfo($record[Map\BuilderInterface::RELATIVE_TEMPLATE_PATH], PATHINFO_EXTENSION)
        );
        $relativeTemplatePath = str_replace(
            $templateFileExtension,
            '',
            $record[Map\BuilderInterface::RELATIVE_TEMPLATE_PATH]
        );
        $supportingActor->setRelativeTemplatePath($relativeTemplatePath);
        $supportingActor->setTemplateFileExtension($templateFileExtension);

        return $supportingActor;
    }

    protected function getRecord(): array
    {
        if ($this->record === null) {
            throw new \LogicException('Builder record has not been set.');
        }

        return $this->record;
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->record !== null) {
            throw new \LogicException('Builder record is already set.');
        }

        $this->record = $record;

        return $this;
    }
}
