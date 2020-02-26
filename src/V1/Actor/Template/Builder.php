<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template;

use Neighborhoods\Buphalo\V1\Actor;
use Neighborhoods\Buphalo\V1\Actor\TemplateInterface;
use Neighborhoods\Buphalo\V1\FabricationFile;
use Neighborhoods\Buphalo\V1\TemplateTree;
use RuntimeException;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Actor\AwareTrait;
    use FabricationFile\Actor\AwareTrait;
    use TemplateTree\Map\Repository\AwareTrait;

    protected $FilePath;

    public function build(): TemplateInterface
    {
        $template = $this->getActorTemplateFactory()->create();
        $template->setTemplateTreeMap($this->getTemplateTreeMapRepository()->get());
        $template->setActor($this->getActor());
        $template->setFilePath($this->getFilePath());
        $template->setFabricationFileActor($this->getFabricationFileActor());

        return $template;
    }

    protected function getFilePath(): string
    {
        if ($this->FilePath === null) {
            $actorTemplateFilePathCandidates = $this->buildActorTemplateFilePathCandidates();
            foreach($actorTemplateFilePathCandidates as $actorTemplateFilePathCandidate) {
                $actorTemplateFilePath = realpath($actorTemplateFilePathCandidate);
                if ($actorTemplateFilePath !== false) {
                    $this->FilePath = $actorTemplateFilePath;
                    return $this->FilePath;
                }
            }

            throw new RuntimeException(
                sprintf('No actor template file was found, checked: %s', implode(',', $actorTemplateFilePathCandidates))
            );
        }

        return $this->FilePath;
    }

    private function buildActorTemplateFilePathCandidates(): array
    {
        $actorTemplateFilePathCandidates = [];

        $templateTreeMap = $this->getTemplateTreeMapRepository()->get();
        foreach($templateTreeMap as $templateTree) {
            $actorTemplateFilePathCandidate = sprintf(
                '%s/%s',
                $templateTree->getDirectoryPath(),
                $this->getFabricationFileActor()->getTemplateRelativeFilePath()
            );

            $actorTemplateFilePathCandidates[] = $actorTemplateFilePathCandidate;
        }

        return $actorTemplateFilePathCandidates;
    }
}
