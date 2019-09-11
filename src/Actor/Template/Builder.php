<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template;

use Neighborhoods\Buphalo\Actor;
use Neighborhoods\Buphalo\Actor\TemplateInterface;
use Neighborhoods\Buphalo\FabricationFile;
use Neighborhoods\Buphalo\TemplateTree;
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
            $actorTemplateFilePathCandidate = sprintf(
                '%s/%s',
                $this->getTemplateTreeMapRepository()->get()->current()->getDirectoryPath(),
                $this->getFabricationFileActor()->getTemplateRelativeFilePath()
            );
            $actorTemplateFilePath = realpath($actorTemplateFilePathCandidate);
            if ($actorTemplateFilePath === false) {
                throw new RuntimeException(
                    sprintf('The actor template file [%s] does not exist.', $actorTemplateFilePathCandidate)
                );
            }
            $this->FilePath = $actorTemplateFilePath;
        }

        return $this->FilePath;
    }
}
