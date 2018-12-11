<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class Bradfab implements BradfabInterface
{
    /** @var string */
    protected $contractNamespaceSourcePath;
    /** @var string */
    protected $contractNamespaceFabPath;
    /** @var Finder */
    protected $finder;
    protected $fabricateYamlFilePaths;
    /** @var Filesystem */
    protected $filesystem;

    protected function encapsulatedNoBueno(): BradfabInterface
    {
        $this->setFinder(new Finder());
        $this->setFilesystem(new Filesystem());
        $this->setContractNamespaceSourcePath(realpath(__DIR__ . '/../../../../src/V2'));
        $this->getFilesystem()->mkdir(__DIR__ . '/../../../../fab/V2');
        $this->setContractNamespaceFabPath(realpath(__DIR__ . '/../../../../fab/V2'));
        $this->getFilesystem()->remove($this->getContractNamespaceFabPath());

        return $this;
    }

    public function fabricate(): BradfabInterface
    {
        $this->encapsulatedNoBueno();

        foreach ($this->getFabricateYamlFilePaths() as $fabricateYamlFilePath => $fabricateYamlFileName) {
            $this->writeActors($fabricateYamlFilePath);
        }

        return $this;
    }

    protected function writeActors($fabricateYamlFilePath): void
    {
        $fabricateYaml = (new Yaml())->parseFile($fabricateYamlFilePath);
        $actorNamePath = str_replace('.fabricate.yml', '', $fabricateYamlFilePath);
        $actorNamePath = str_replace($this->getContractNamespaceSourcePath() . '/', '', $actorNamePath);
        $actorNameSpace = 'Neighborhood\RETSMaterialization\\' . $actorNamePath;
        foreach ($fabricateYaml['build'] as $supportingActorKey => $buildSupportingActor) {
            $supportingActorFilePath = str_replace('src', 'fab', $fabricateYamlFilePath);
            $supportingActorFilePath = str_replace('.fabricate.yml', '/', $supportingActorFilePath);
            $supportingActorFilePath .= str_replace(
                '\\',
                '/',
                $supportingActorKey . '.php'
            );
            $this->writeActor($supportingActorKey, $actorNameSpace, $actorNamePath, $supportingActorFilePath);
        }
    }

    protected function writeActor(
        string $supportingActorKey,
        string $actorNameSpace,
        string $actorNamePath,
        string $supportingActorFilePath
    ): BradfabInterface {
        $supportingActorTemplateFilePath = realpath(
            __DIR__
            . '/Template/Actor/'
            . str_replace('\\', '/', $supportingActorKey) . '.php');
        $supportingActorTemplate = file_get_contents($supportingActorTemplateFilePath);
        $supportingActorTemplate = str_replace(
            'Rhift\Bradfab\Template\Actor',
            $actorNameSpace,
            $supportingActorTemplate
        );
        $supportingActorTemplate = str_replace('Actor', $actorNamePath, $supportingActorTemplate);

        $this->getFilesystem()->mkdir(dirname($supportingActorFilePath));
        file_put_contents($supportingActorFilePath, $supportingActorTemplate);

        return $this;
    }

    protected function getFabricateYamlFilePaths(): array
    {
        if ($this->fabricateYamlFilePaths === null) {
            $finder = $this->getFinder()->in($this->getContractNamespaceSourcePath());
            $finder->name('*.fabricate.yml');
            /** @var $file SplFileInfo */
            foreach ($finder as $directoryPath => $file) {
                $this->fabricateYamlFilePaths[$file->getPathname()] = $file->getFilename();
            }
        }

        return $this->fabricateYamlFilePaths;
    }

    protected function getFinder(): Finder
    {
        if ($this->finder === null) {
            throw new \LogicException('Bradfab finder has not been set.');
        }

        return $this->finder;
    }

    public function setFinder(Finder $finder): BradfabInterface
    {
        if ($this->finder !== null) {
            throw new \LogicException('Bradfab finder is already set.');
        }

        $this->finder = $finder;

        return $this;
    }

    protected function getContractNamespaceSourcePath(): string
    {
        if ($this->contractNamespaceSourcePath === null) {
            throw new \LogicException('Bradfab contractNamespacePath has not been set.');
        }

        return $this->contractNamespaceSourcePath;
    }

    public function setContractNamespaceSourcePath(string $contractNamespacePath): BradfabInterface
    {
        if ($this->contractNamespaceSourcePath !== null) {
            throw new \LogicException('Bradfab contractNamespacePath is already set.');
        }

        $this->contractNamespaceSourcePath = $contractNamespacePath;

        return $this;
    }

    public function getContractNamespaceFabPath(): string
    {
        if ($this->contractNamespaceFabPath === null) {
            throw new \LogicException('Bradfab contractNamespaceFabPath has not been set.');
        }

        return $this->contractNamespaceFabPath;
    }

    public function setContractNamespaceFabPath(string $contractNamespaceFabPath): BradfabInterface
    {
        if ($this->contractNamespaceFabPath !== null) {
            throw new \LogicException('Bradfab contractNamespaceFabPath is already set.');
        }

        $this->contractNamespaceFabPath = $contractNamespaceFabPath;

        return $this;
    }

    public function getFilesystem(): Filesystem
    {
        if ($this->filesystem === null) {
            throw new \LogicException('Bradfab filesystem has not been set.');
        }

        return $this->filesystem;
    }

    public function setFilesystem(Filesystem $filesystem): BradfabInterface
    {
        if ($this->filesystem !== null) {
            throw new \LogicException('Bradfab filesystem is already set.');
        }

        $this->filesystem = $filesystem;

        return $this;
    }
}
