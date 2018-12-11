<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class Fabricator implements FabricatorInterface
{
    /** @var string */
    protected $source_path;
    /** @var string */
    protected $fabrication_path;
    /** @var Finder */
    protected $finder;
    protected $fabricate_yaml_file_paths;
    /** @var Filesystem */
    protected $filesystem;
    /** @var string */
    protected $target_namespace;
    /** @var string */
    protected $template_actor_directory_path;

    protected function encapsulatedNoBueno(): FabricatorInterface
    {
        $fabricationRelativePath = __DIR__ . '/../fab';
        // Ensure that the fabrication file path exists so that realpath can verify it.
        $this->getFilesystem()->mkdir($fabricationRelativePath);

        $this->setTargetNamespace('Rhift\BradFab\\');
        $this->setSourcePath(realpath(__DIR__ . '/../src'));
        $this->setFabricationPath(realpath($fabricationRelativePath));
        $this->setTemplateActorDirectoryPath(realpath(__DIR__ . '/Template/Actor/'));

        $this->getFilesystem()->remove($this->getFabricationPath());

        return $this;
    }

    public function fabricate(): FabricatorInterface
    {
        $this->encapsulatedNoBueno();
        foreach ($this->getFabricateYamlFilePaths() as $fabricateYamlFilePath => $fabricateYamlFileName) {
            $this->writeActors($fabricateYamlFilePath);
        }

        return $this;
    }

    protected function writeActors($fabricateYamlFilePath): FabricatorInterface
    {
        $fabricateYaml = (new Yaml())->parseFile($fabricateYamlFilePath);
        $actorNamePath = str_replace('.fabricate.yml', '', $fabricateYamlFilePath);
        $actorNamePath = str_replace($this->getSourcePath() . '/', '', $actorNamePath);
        $actorNameSpace = $this->getTargetNamespace() . $actorNamePath;
        $actorNameSpace = str_replace('/', '\\', $actorNameSpace);
        if (isset($fabricateYaml['fabricate']) && is_array($fabricateYaml['fabricate'])) {
            foreach ($fabricateYaml['fabricate'] as $supportingActorKey => $buildSupportingActor) {
                if ($buildSupportingActor === true) {
                    $supportingActorFilePath = $this->getSupportingActorFilePath(
                        $fabricateYamlFilePath,
                        $supportingActorKey,
                        '.php'
                    );
                    $supportingActorTemplate = $this->getSupportingActorTemplate(
                        $supportingActorKey,
                        $actorNameSpace,
                        '.php'
                    );
                    $this->writeActor($supportingActorTemplate, $actorNamePath, $supportingActorFilePath);
                    if (
                        strpos($supportingActorKey, 'AwareTrait') === false
                        && strpos($supportingActorKey, 'Interface') === false
                    ) {
                        $supportingActorFilePath = $this->getSupportingActorFilePath(
                            $fabricateYamlFilePath,
                            $supportingActorKey,
                            '.yml'
                        );
                        $supportingActorTemplate = $this->getSupportingActorTemplate(
                            $supportingActorKey,
                            $actorNameSpace,
                            '.yml'
                        );
                        $this->writeActor($supportingActorTemplate, $actorNamePath, $supportingActorFilePath);
                    }
                }
            }
        }

        return $this;
    }

    protected function getSupportingActorTemplate(
        string $supportingActorKey,
        string $actorNameSpace,
        string $extension
    ): string {
        $supportingActorTemplateFilePath = realpath(
            $this->getTemplateActorDirectoryPath()
            . '/'
            . str_replace('\\', '/', $supportingActorKey)
            . $extension
        );
        $supportingActorTemplate = file_get_contents($supportingActorTemplateFilePath);
        $supportingActorTemplate = str_replace(
            'Rhift\Bradfab\Template\Actor',
            $actorNameSpace,
            $supportingActorTemplate
        );

        return $supportingActorTemplate;
    }

    protected function getSupportingActorFilePath(
        string $fabricateYamlFilePath,
        string $supportingActorKey,
        string $extension
    ): string {
        $supportingActorFilePath = str_replace('src', 'fab', $fabricateYamlFilePath);
        $supportingActorFilePath = str_replace('.fabricate.yml', '/', $supportingActorFilePath);
        $supportingActorFilePath .= str_replace(
            '\\',
            '/',
            $supportingActorKey . $extension
        );

        return $supportingActorFilePath;
    }

    protected function writeActor(
        string $supportingActorTemplate,
        string $actorNamePath,
        string $supportingActorFilePath
    ): FabricatorInterface {

        $actorNamePath = trim(substr($actorNamePath, strrpos($actorNamePath, '/') + 1));
        $supportingActorTemplate = str_replace('Actor', $actorNamePath, $supportingActorTemplate);

        $this->getFilesystem()->mkdir(dirname($supportingActorFilePath));
        file_put_contents($supportingActorFilePath, $supportingActorTemplate);

        return $this;
    }

    protected function getFabricateYamlFilePaths(): array
    {
        if ($this->fabricate_yaml_file_paths === null) {
            $finder = $this->getFinder()->in($this->getSourcePath());
            $finder->name('*.fabricate.yml');
            /** @var $file SplFileInfo */
            foreach ($finder as $directoryPath => $file) {
                $this->fabricate_yaml_file_paths[$file->getPathname()] = $file->getFilename();
            }
        }

        return $this->fabricate_yaml_file_paths;
    }

    protected function getFinder(): Finder
    {
        if ($this->finder === null) {
            throw new \LogicException('Bradfab finder has not been set.');
        }

        return $this->finder;
    }

    public function setFinder(Finder $finder): FabricatorInterface
    {
        if ($this->finder !== null) {
            throw new \LogicException('Bradfab finder is already set.');
        }

        $this->finder = $finder;

        return $this;
    }

    protected function getSourcePath(): string
    {
        if ($this->source_path === null) {
            throw new \LogicException('Bradfab source_path has not been set.');
        }

        return $this->source_path;
    }

    public function setSourcePath(string $source_path): FabricatorInterface
    {
        if ($this->source_path !== null) {
            throw new \LogicException('Bradfab source_path is already set.');
        }

        $this->source_path = $source_path;

        return $this;
    }

    public function getFabricationPath(): string
    {
        if ($this->fabrication_path === null) {
            throw new \LogicException('Bradfab fabrication_path has not been set.');
        }

        return $this->fabrication_path;
    }

    public function setFabricationPath(string $fabrication_path): FabricatorInterface
    {
        if ($this->fabrication_path !== null) {
            throw new \LogicException('Bradfab fabrication_path is already set.');
        }

        $this->fabrication_path = $fabrication_path;

        return $this;
    }

    public function getFilesystem(): Filesystem
    {
        if ($this->filesystem === null) {
            throw new \LogicException('Bradfab filesystem has not been set.');
        }

        return $this->filesystem;
    }

    public function setFilesystem(Filesystem $filesystem): FabricatorInterface
    {
        if ($this->filesystem !== null) {
            throw new \LogicException('Bradfab filesystem is already set.');
        }

        $this->filesystem = $filesystem;

        return $this;
    }

    public function getTargetNamespace(): string
    {
        if ($this->target_namespace === null) {
            throw new \LogicException('Bradfab target_namespace has not been set.');
        }

        return $this->target_namespace;
    }

    public function setTargetNamespace(string $target_namespace): FabricatorInterface
    {
        if ($this->target_namespace !== null) {
            throw new \LogicException('Bradfab target_namespace is already set.');
        }

        $this->target_namespace = $target_namespace;

        return $this;
    }

    public function getTemplateActorDirectoryPath(): string
    {
        if ($this->template_actor_directory_path === null) {
            throw new \LogicException('Bradfab template_actor_directory_path has not been set.');
        }

        return $this->template_actor_directory_path;
    }

    public function setTemplateActorDirectoryPath(string $template_actor_directory_path): FabricatorInterface
    {
        if ($this->template_actor_directory_path !== null) {
            throw new \LogicException('Bradfab template_actor_directory_path is already set.');
        }

        $this->template_actor_directory_path = $template_actor_directory_path;

        return $this;
    }
}
