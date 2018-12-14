<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Rhift\Bradfab\FabricationFile\SupportingActor\Map;
use Rhift\Bradfab\FabricationFile\SupportingActor\BuilderInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class Fabricator implements FabricatorInterface
{
    use FabricationFile\Builder\Factory\AwareTrait;

    const FILE_EXTENSION_FABRICATION = '.fabrication.yml';
    const NAMESPACE_TOKEN = '**NAMESPACE_TOKEN**';
    /** @var string */
    protected $source_path;
    /** @var string */
    protected $fabrication_path;
    /** @var Finder */
    protected $finder;
    protected $fabricate_yaml_files;
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

        $this->setTargetNamespace('Rhift\Bradfab\\');
        $this->setSourcePath(realpath(__DIR__ . '/../src'));
        $this->setFabricationPath(realpath($fabricationRelativePath));
        $this->setTemplateActorDirectoryPath(realpath(__DIR__ . '/Template/Actor/'));

        $this->getFilesystem()->remove($this->getFabricationPath());

        return $this;
    }

    public function fabricate(): FabricatorInterface
    {
        $this->encapsulatedNoBueno();
        /** @var SplFileInfo $fabricateYamlFile */
        foreach ($this->getFabricateYamlFiles() as $fabricateYamlFilePathname => $fabricateYamlFile) {
            $this->writeActors($fabricateYamlFilePathname);
            $fabricationFileBuilder = $this->getFabricationFileBuilderFactory()->create();
            $fabricationFile = $fabricationFileBuilder->setSplFileInfo($fabricateYamlFile)->build();
        }

        return $this;
    }

    protected function writeActors($fabricateYamlFilePath): FabricatorInterface
    {
        $fabricateYaml = Yaml::parseFile($fabricateYamlFilePath);
        $actorNamePath = str_replace(self::FILE_EXTENSION_FABRICATION, '', $fabricateYamlFilePath);
        $actorNamePath = str_replace($this->getSourcePath() . '/', '', $actorNamePath);
        $actorNameSpace = $this->getTargetNamespace() . $actorNamePath;
        $actorNameSpace = str_replace('/', '\\', $actorNameSpace);
        if (is_array($fabricateYaml[Map\BuilderInterface::SUPPORTING_ACTORS])) {
            $supportingActors = $fabricateYaml[Map\BuilderInterface::SUPPORTING_ACTORS];
            foreach ($supportingActors as $supportingActorKey => $supportingActorProperties) {
                if ($supportingActorProperties[BuilderInterface::FABRICATE] === true) {
                    $supportingActorFilePath = $this->getSupportingActorFilePath(
                        $fabricateYamlFilePath,
                        $supportingActorKey,
                        '.php'
                    );
                    if (!is_file(str_replace('/fab/', '/src/', $supportingActorFilePath))) {
                        $supportingActorTemplate = $this->getSupportingActorTemplate(
                            $supportingActorKey,
                            '.php'
                        );
                        $this->writeActor(
                            $supportingActorTemplate,
                            $actorNamePath,
                            $supportingActorFilePath,
                            $actorNameSpace
                        );
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
                                '.yml'
                            );
                            $this->writeActor(
                                $supportingActorTemplate,
                                $actorNamePath,
                                $supportingActorFilePath,
                                $actorNameSpace
                            );
                        }
                    }
                }
            }
        }

        return $this;
    }

    protected function getSupportingActorTemplate(
        string $supportingActorKey,
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
            self::NAMESPACE_TOKEN,
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
        $supportingActorFilePath = str_replace(self::FILE_EXTENSION_FABRICATION, '/', $supportingActorFilePath);
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
        string $supportingActorFilePath,
        string $actorNamespace
    ): FabricatorInterface {

        $actorNamePath = str_replace('/', '', $actorNamePath);//trim(substr($actorNamePath, $start));
        $supportingActorTemplate = str_replace('Actor', $actorNamePath, $supportingActorTemplate);
        $supportingActorTemplate = str_replace(
            self::NAMESPACE_TOKEN,
            $actorNamespace,
            $supportingActorTemplate
        );
        $this->getFilesystem()->mkdir(dirname($supportingActorFilePath));
        file_put_contents($supportingActorFilePath, $supportingActorTemplate);

        return $this;
    }

    protected function getFabricateYamlFiles(): array
    {
        if ($this->fabricate_yaml_files === null) {
            $finder = $this->getFinder()->in($this->getSourcePath());
            $finder->name('*' . self::FILE_EXTENSION_FABRICATION);
            /** @var $file SplFileInfo */
            foreach ($finder as $directoryPath => $file) {
                $pathname = $file->getPathname();
                if (isset($this->fabricate_yaml_files[$pathname])) {
                    $message = sprintf('Fabricate yaml file with pathname[%s] is already set.', $pathname);
                    throw new \LogicException($message);
                }
                $this->fabricate_yaml_files[$pathname] = $file;
            }
        }

        return $this->fabricate_yaml_files;
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
