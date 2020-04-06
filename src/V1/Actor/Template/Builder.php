<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template;

use Neighborhoods\Buphalo\V1\Actor;
use Neighborhoods\Buphalo\V1\Actor\TemplateInterface;
use Neighborhoods\Buphalo\V1\FabricationFile;
use Neighborhoods\Buphalo\V1\TemplateTree;
use Neighborhoods\Buphalo\V1\TemplateTreeInterface;
use RuntimeException;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Actor\AwareTrait;
    use FabricationFile\Actor\AwareTrait;
    use FabricationFile\AwareTrait;
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

        // Let the Actor preferences be used over the Fabrication File ones
        if ($this->getFabricationFileActor()->hasPreferredTemplateTrees()) {
            foreach($this->getFabricationFileActor()->getPreferredTemplateTrees() as $treeName) {
                if (isset($templateTreeMap[$treeName])) {
                    $path = $this->buildTemplatePath($templateTreeMap[$treeName]);
                    $actorTemplateFilePathCandidates[$path] = true;
                } else {
                    throw new \RuntimeException(
                        sprintf('Template tree %s referenced in %s > %s has not been defined.',
                            $treeName,
                            $this->getFabricationFile()->getFilePath(),
                            $this->getFabricationFileActor()->getFileName()
                        )
                    );
                }
            }
        }

        // Let the Fabrication File preferences be used over global ones
        if ($this->getFabricationFile()->hasPreferredTemplateTrees()) {
            foreach ($this->getFabricationFile()->getPreferredTemplateTrees() as $treeName) {
                if (isset($templateTreeMap[$treeName])) {
                    $path = $this->buildTemplatePath($templateTreeMap[$treeName]);
                    $actorTemplateFilePathCandidates[$path] = true;
                } else {
                    throw new \RuntimeException(
                        sprintf('Template tree %s referenced in %s has not been defined.',
                            $treeName,
                            $this->getFabricationFile()->getFilePath()
                        )
                    );
                }
            }
        }

        foreach($templateTreeMap as $templateTree) {
            $path = $this->buildTemplatePath($templateTree);
            $actorTemplateFilePathCandidates[$path] = true;
        }

        return array_keys($actorTemplateFilePathCandidates);
    }

    private function buildTemplatePath(TemplateTreeInterface $templateTree): string
    {
        return implode(DIRECTORY_SEPARATOR, [
            $templateTree->getDirectoryPath(),
            $this->getFabricationFileActor()->getTemplateRelativeFilePath(),
        ]);
    }
}
