<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile;

use LogicException;
use Neighborhoods\Bradfab\FabricationFile;
use Neighborhoods\Bradfab\FabricationFileInterface;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class Builder implements BuilderInterface
{
    use FabricationFile\Factory\AwareTrait;
    use FabricationFile\Actor\Map\Builder\Factory\AwareTrait;

    protected $SplFileInfo;
    protected $FileName;

    public function build(): FabricationFileInterface
    {
        $fabricationFile = $this->getFabricationFileFactory()->create();

        $fabricationFile->setBaseName($this->getSplFileInfo()->getBasename());
        $fabricationFile->setFileName($this->getFileName());
        $fabricationFile->setFilePath($this->getSplFileInfo()->getPathname());
        $fabricationFile->setDirectoryPath($this->getSplFileInfo()->getPath());
        $fabricationFile->setRelativeDirectoryPath($this->getSplFileInfo()->getRelativePath());
        $fabricationFile->setRelativeFilePath($this->getSplFileInfo()->getRelativePathname());
        $this->addActors($fabricationFile);

        return $fabricationFile;
    }

    protected function getSplFileInfo(): SplFileInfo
    {
        if ($this->SplFileInfo === null) {
            throw new LogicException('Builder SplFileInfo has not been set.');
        }

        return $this->SplFileInfo;
    }

    public function setSplFileInfo(SplFileInfo $spl_file_info): BuilderInterface
    {
        if ($this->SplFileInfo !== null) {
            throw new LogicException('Builder SplFileInfo is already set.');
        }

        $this->SplFileInfo = $spl_file_info;

        return $this;
    }

    protected function getFabricationFileContents(): array
    {
        $fabricationFileContents = Yaml::parseFile($this->getSplFileInfo()->getPathname(), YAML::PARSE_CONSTANT);

        return $fabricationFileContents;
    }

    protected function addActors(FabricationFileInterface $fabricationFile): Builder
    {
        $fabricationFileContents = $this->getFabricationFileContents();
        $fabricationFileActorMapBuilder = $this->getFabricationFileActorMapBuilderFactory()->create();
        $fabricationFileActorMapBuilder->setFabricationFile($fabricationFile);
        $actors = $fabricationFileActorMapBuilder->setRecords($fabricationFileContents)->build();
        $fabricationFile->setActors($actors);

        return $this;
    }

    public function getFileName(): string
    {
        if ($this->FileName === null) {
            $this->FileName = substr(
                $this->getSplFileInfo()->getBaseName(),
                0,
                strpos($this->getSplFileInfo()->getBaseName(), '.')
            );
        }

        return $this->FileName;
    }
}
