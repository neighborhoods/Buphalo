<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\FabricationFileInterface;
use Rhift\Bradfab\FabricationFile;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use FabricationFile\SupportingActor\Map\Builder\Factory\AwareTrait;

    protected $spl_file_info;

    public function build(): FabricationFileInterface
    {
        $fabricationFileContents = Yaml::parseFile($this->getSPLFileInfo()->getPathname());
        $fabricationFile = $this->getFabricationFileFactory()->create();
        $supportingActorMapBuilder = $this->getFabricationFileSupportingActorMapBuilderFactory()->create();
        $supportingActorMap = $supportingActorMapBuilder->setRecords($fabricationFileContents)->build();
        $fabricationFile->setSupportingActors($supportingActorMap);

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
