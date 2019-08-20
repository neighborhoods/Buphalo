<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use LogicException;
use Symfony\Component\Filesystem\Filesystem;

class Fabricator implements FabricatorInterface
{
    use FabricationFile\Builder\Factory\AwareTrait;
    use Actor\Template\Builder\Factory\AwareTrait;
    use Actor\Template\Tokenizer\Builder\Factory\AwareTrait;
    use Actor\Template\Compiler\Builder\Factory\AwareTrait;
    use Actor\Template\Compiler\Strategy\Factory\AwareTrait;
    use Actor\Builder\Factory\AwareTrait;
    use Actor\Writer\Builder\Factory\AwareTrait;
    use TargetApplication\Repository\AwareTrait;
    use TemplateTree\Map\Builder\Factory\AwareTrait;
    use FabricationFile\Map\Builder\Factory\AwareTrait;

    protected $Filesystem;

    public function fabricate(): FabricatorInterface
    {
        $this->removeFabricationDirectory();
        $fabricationFileMap = $this->getFabricationFileMapBuilderFactory()->create()->build();
        foreach ($fabricationFileMap as $fabricationFile) {
            foreach ($fabricationFile->getActors() as $fabricationFileActor) {
                $writerBuilder = $this->getActorWriterBuilderFactory()->create();
                $writerBuilder->setFabricationFile($fabricationFile);
                $writerBuilder->setFabricationFileActor($fabricationFileActor);
                $writer = $writerBuilder->build();
                $writer->write();
            }
        }

        return $this;
    }

    protected function removeFabricationDirectory(): FabricatorInterface
    {
        $targetApplication = $this->getTargetApplicationRepository()->get();
        if ($this->getFilesystem()->exists($targetApplication->getFabricationPath())) {
            $this->getFilesystem()->remove($targetApplication->getFabricationPath());
        }

        return $this;
    }

    public function getFilesystem(): Filesystem
    {
        if ($this->Filesystem === null) {
            throw new LogicException('Bradfab Filesystem has not been set.');
        }

        return $this->Filesystem;
    }

    public function setFilesystem(Filesystem $filesystem): FabricatorInterface
    {
        if ($this->Filesystem !== null) {
            throw new LogicException('Bradfab Filesystem is already set.');
        }

        $this->Filesystem = $filesystem;

        return $this;
    }
}
