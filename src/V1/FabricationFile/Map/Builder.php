<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Map;

use LogicException;
use Neighborhoods\Buphalo\V1\FabricationFile;
use Neighborhoods\Buphalo\V1\FabricationFile\MapInterface;
use Neighborhoods\Buphalo\V1\Symfony;
use Neighborhoods\Buphalo\V1\TargetApplication;
use Symfony\Component\Finder\SplFileInfo;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use TargetApplication\Repository\AwareTrait;
    use Symfony\Component\Finder\Finder\AwareTrait;
    use FabricationFile\Builder\Factory\AwareTrait;

    protected $FinderFileNames;

    public function build(): MapInterface
    {
        $map = $this->getFabricationFileMapFactory()->create();
        $sourceDirectoryPath = $this->getTargetApplicationRepository()->get()->getSourceDirectoryPath();
        $finder = $this->getSymfonyComponentFinderFinder();
        $finder->in($sourceDirectoryPath);
        $finder->files()->name($this->getFinderFileNames());

        /** @var SplFileInfo $fileInfo */
        foreach ($finder as $directoryPath => $fileInfo) {
            $pathname = $fileInfo->getPathname();
            $fabricationFileBuilder = $this->getFabricationFileBuilderFactory()->create();
            $fabricationFile = $fabricationFileBuilder->setSplFileInfo($fileInfo)->build();
            $map[$pathname] = $fabricationFile;
        }

        return $map;
    }

    protected function getFinderFileNames(): array
    {
        if ($this->FinderFileNames === null) {
            throw new LogicException('Finder File Names has not been set.');
        }

        return $this->FinderFileNames;
    }

    public function setFinderFileNames(array $FinderFileNames): BuilderInterface
    {
        if ($this->FinderFileNames !== null) {
            throw new LogicException('Finder File Names is already set.');
        }

        $this->FinderFileNames = $FinderFileNames;

        return $this;
    }
}
