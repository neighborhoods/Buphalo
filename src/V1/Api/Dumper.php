<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Api;

use Neighborhoods\Buphalo;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml;

class Dumper implements DumperInterface
{
    /** @var Filesystem */
    private $filesystem;

    /** @var string */
    private $basePath;

    public function __construct(string $basePath)
    {
        $this->setBasePath($basePath);

        $this->setFilesystem(new Filesystem());
    }

    public function dumpFile(FabricationFileInterface $fabricationFile): Dumper
    {
        $this->getFilesystem()->dumpFile($this->buildFilePath($fabricationFile), $this->dump($fabricationFile));

        return $this;
    }

    private function buildFilePath(FabricationFileInterface $fabricationFile): string
    {
        return sprintf(
            implode(DIRECTORY_SEPARATOR, ['%s', '%s', '%s']) . '.%s',
            $this->getBasePath(),
            $fabricationFile->getRelativePath(),
            $fabricationFile->getPrimaryActorName(),
            Buphalo\V1\FabricationFileInterface::FILE_EXTENSION_FABRICATION
        );
    }

    public function dump(FabricationFileInterface $fabricationFile): string
    {
        $data = \json_decode(\json_encode($fabricationFile), true);

        // Not strictly necessary for ephemeral files, but these keys would be ignored by Buphalo anyway
        unset(
            $data[FabricationFileInterface::PROP_RELATIVE_PATH],
            $data[FabricationFileInterface::PROP_PRIMARY_ACTOR_NAME]
        );

        return Yaml\Yaml::dump($data, PHP_INT_MAX, 2);
    }

    public function setFilesystem(Filesystem $filesystem): void
    {
        $this->filesystem = $filesystem;
    }

    private function getFilesystem(): Filesystem
    {
        if ($this->filesystem === null) {
            throw new \LogicException('Dumper filesystem has not been set.');
        }

        return $this->filesystem;
    }

    public function setBasePath(string $basePath): void
    {
        $this->basePath = $basePath;
    }

    private function getBasePath(): string
    {
        if ($this->basePath === null) {
            throw new \LogicException('Dumper basePath has not been set.');
        }

        return $this->basePath;
    }
}
