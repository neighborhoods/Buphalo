<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Map;

use Neighborhoods\Bradfab\FabricationFile;
use Neighborhoods\Bradfab\FabricationFile\MapInterface;
use Neighborhoods\Bradfab\FabricationFileInterface;
use Neighborhoods\Bradfab\Symfony;
use Neighborhoods\Bradfab\TargetApplication;
use Symfony\Component\Finder\SplFileInfo;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use TargetApplication\Repository\AwareTrait;
    use Symfony\Component\Finder\Finder\AwareTrait;
    use FabricationFile\Builder\Factory\AwareTrait;

    public function build(): MapInterface
    {
        $map = $this->getFabricationFileMapFactory()->create();
        $sourceDirectoryPath = $this->getTargetApplicationRepository()->get()->getSourceDirectoryPath();
        $finder = $this->getSymfonyComponentFinderFinder()->in($sourceDirectoryPath);
        $finder->name('*' . FabricationFileInterface::FILE_EXTENSION_FABRICATION);
        //$finder->files()->name('Test.fabrication.yml');

        /** @var $fileInfo SplFileInfo */
        foreach ($finder as $directoryPath => $fileInfo) {
            $pathname = $fileInfo->getPathname();
            $fabricationFileBuilder = $this->getFabricationFileBuilderFactory()->create();
            $fabricationFile = $fabricationFileBuilder->setSplFileInfo($fileInfo)->build();
            $map[$pathname] = $fabricationFile;
        }

        return $map;
    }
}
