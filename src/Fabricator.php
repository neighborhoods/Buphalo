<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo;

use LogicException;
use Symfony\Component\Filesystem\Filesystem;

class Fabricator implements FabricatorInterface
{
    use Actor\Writer\Builder\Factory\AwareTrait;
    use TargetApplication\Repository\AwareTrait;
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
        if ($this->getFilesystem()->exists($targetApplication->getFabricationDirectoryPath())) {
            $this->getFilesystem()->remove($targetApplication->getFabricationDirectoryPath());
        }

        return $this;
    }

    public function getFilesystem(): Filesystem
    {
        if ($this->Filesystem === null) {
            throw new LogicException('Buphalo Filesystem has not been set.');
        }

        return $this->Filesystem;
    }

    public function setFilesystem(Filesystem $filesystem): FabricatorInterface
    {
        if ($this->Filesystem !== null) {
            throw new LogicException('Buphalo Filesystem is already set.');
        }

        $this->Filesystem = $filesystem;

        return $this;
    }
}
