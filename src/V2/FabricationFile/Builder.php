<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile;

use LogicException;
use Neighborhoods\Buphalo\V2\FabricationFile;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;
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
        $fabricationFileContents = $this->getFabricationFileContents();

        $fabricationFile->setBaseName($this->getSplFileInfo()->getBasename());
        $fabricationFile->setFileName($this->getFileName());
        $fabricationFile->setFilePath($this->getSplFileInfo()->getPathname());
        $fabricationFile->setDirectoryPath($this->getSplFileInfo()->getPath());
        $fabricationFile->setRelativeDirectoryPath($this->getSplFileInfo()->getRelativePath());
        $fabricationFile->setRelativeFilePath($this->getSplFileInfo()->getRelativePathname());

        if (isset($fabricationFileContents[FabricationFileInterface::KEY_PREFERRED_TEMPLATE_TREES])) {
            $fabricationFile->setPreferredTemplateTrees(
                ...$fabricationFileContents[FabricationFileInterface::KEY_PREFERRED_TEMPLATE_TREES]
            );
        }

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
        $fabricationFileContents = Yaml::parseFile($this->getSplFileInfo()->getPathname(), Yaml::PARSE_CONSTANT);

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
                $this->getSplFileInfo()->getBasename(),
                0,
                strpos($this->getSplFileInfo()->getBasename(), '.')
            );
        }

        return $this->FileName;
    }
}
