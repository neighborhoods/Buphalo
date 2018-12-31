<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile;

use Neighborhoods\Bradfab\FabricationFileInterface;
use Neighborhoods\Bradfab\FabricationFile;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use FabricationFile\Actor\Map\Builder\Factory\AwareTrait;

    protected $spl_file_info;

    public function build(): FabricationFileInterface
    {
        $fabricationFileContents = Yaml::parseFile($this->getSPLFileInfo()->getPathname(), YAML::PARSE_CONSTANT);
        $fabricationFile = $this->getFabricationFileFactory()->create();
        $actorMapBuilder = $this->getFabricationFileActorMapBuilderFactory()->create();
        $actors = $actorMapBuilder->setRecords($fabricationFileContents)->build();
        foreach ($actors as $actor) {
            if ($actor->hasAnnotationProcessorMap()) {
                foreach ($actor->getAnnotationProcessorMap() as $annotationProcessor) {
                    $annotationProcessor->getAnnotationProcessorContext()->setFabricationFile($fabricationFile);
                }
            }
        }
        $fabricationFile->setActors($actors);
        $fabricationFile->setFileName($this->getSPLFileInfo()->getFilename());
        $fabricationFile->setFilePath($this->getSPLFileInfo()->getPathname());
        $fabricationFile->setRelativeDirectoryPath($this->getSPLFileInfo()->getRelativePath());
        $fabricationFile->setRelativeFilePath($this->getSPLFileInfo()->getRelativePathname());

        return $fabricationFile;
    }

    protected function getSPLFileInfo(): SplFileInfo
    {
        if ($this->spl_file_info === null) {
            throw new \LogicException('Builder spl_file_info has not been set.');
        }

        return $this->spl_file_info;
    }

    public function setSplFileInfo(SplFileInfo $spl_file_info): BuilderInterface
    {
        if ($this->spl_file_info !== null) {
            throw new \LogicException('Builder spl_file_info is already set.');
        }

        $this->spl_file_info = $spl_file_info;

        return $this;
    }
}
