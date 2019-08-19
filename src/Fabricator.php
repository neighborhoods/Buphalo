<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use LogicException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

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

    protected $Finder;
    protected $FabricateYamlFiles;
    protected $Filesystem;

    public function fabricate(): FabricatorInterface
    {
        $this->removeFabricationDirectory();
        /** @var SplFileInfo $fabricationFileSplFileInfo */
        foreach ($this->getFabricationYamlFiles() as $fabricationFilePath => $fabricationFileSplFileInfo) {
            $fabricationFileBuilder = $this->getFabricationFileBuilderFactory()->create();
            $fabricationFile = $fabricationFileBuilder->setSplFileInfo($fabricationFileSplFileInfo)->build();
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

    protected function getFabricationYamlFiles(): array
    {
        if ($this->FabricateYamlFiles === null) {
            // @Please change this and get|setFinder to a Finder\Builder & Finder\Builder\Factory.
            $finder = $this->getFinder()->in($this->getTargetApplicationRepository()->get()->getSourceDirectoryPath());
            $finder->name('*' . FabricationFileInterface::FILE_EXTENSION_FABRICATION);
            //$finder->files()->name('Test.fabrication.yml');

            /** @var $file SplFileInfo */
            foreach ($finder as $directoryPath => $file) {
                $pathname = $file->getPathname();
                if (isset($this->FabricateYamlFiles[$pathname])) {
                    $message = sprintf('Fabricate YAML file with pathname[%s] is already set.', $pathname);
                    throw new LogicException($message);
                }
                $this->FabricateYamlFiles[$pathname] = $file;
            }
        }

        return $this->FabricateYamlFiles;
    }

    protected function getFinder(): Finder
    {
        if ($this->Finder === null) {
            throw new LogicException('Bradfab Finder has not been set.');
        }

        return $this->Finder;
    }

    public function setFinder(Finder $finder): FabricatorInterface
    {
        if ($this->Finder !== null) {
            throw new LogicException('Bradfab Finder is already set.');
        }
        $this->Finder = $finder;

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
