<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class Fabricator implements FabricatorInterface
{
    use FabricationFile\Builder\Factory\AwareTrait;
    use SupportingActor\Template\Factory\AwareTrait;
    use SupportingActor\Template\Tokenizer\Factory\AwareTrait;
    use SupportingActor\Template\Compiler\Factory\AwareTrait;
    use SupportingActor\Template\Compiler\Strategy\Factory\AwareTrait;
    use TargetActor\Factory\AwareTrait;
    use SupportingActor\Writer\Factory\AwareTrait;
    use TargetApplication\AwareTrait;
    protected $finder;
    protected $fabricate_yaml_files;
    protected $filesystem;
    protected $template_actor_directory_path;

    protected function encapsulatedNoBueno(): FabricatorInterface
    {
        $fabricationRelativePath = __DIR__ . '/../fab';
        // Ensure that the fabrication file path exists so that realpath can verify it.
        $this->getFilesystem()->mkdir($fabricationRelativePath);

        $this->getTargetApplication()->setFqcn('Rhift\Bradfab\\');
        $this->getTargetApplication()->setSourcePath(realpath(__DIR__ . '/../src'));
        $this->getTargetApplication()->setFabricationPath(realpath($fabricationRelativePath));
        $this->setTemplateActorDirectoryPath(realpath(__DIR__ . '/Template/Actor/'));

        return $this;
    }

    public function fabricate(): FabricatorInterface
    {
        $this->encapsulatedNoBueno();

        $this->getFilesystem()->remove($this->getTargetApplication()->getFabricationPath());
        /** @var SplFileInfo $fabricateYamlSPLFileInfo */
        foreach ($this->getFabricateYamlFiles() as $fabricateYamlFilePathname => $fabricateYamlSPLFileInfo) {
            $fabricationFileBuilder = $this->getFabricationFileBuilderFactory()->create();
            $fabricationFile = $fabricationFileBuilder->setSplFileInfo($fabricateYamlSPLFileInfo)->build();
            foreach ($fabricationFile->getSupportingActors() as $supportingActor) {
                $targetActor = $this->getTargetActorFactory()->create();
                $targetActor->setFabricationFile($fabricationFile);
                $targetActor->setTargetApplication($this->getTargetApplication());
                $template = $this->getSupportingActorTemplateFactory()->create();
                $template->setFabricationFileSupportingActor($supportingActor);
                $template->setTemplateActorDirectoryPath($this->getTemplateActorDirectoryPath());
                $tokenizer = $this->getSupportingActorTemplateTokenizerFactory()->create();
                $tokenizer->setSupportingActorTemplate($template);
                $strategy = $this->getSupportingActorTemplateCompilerStrategyFactory()->create();
                $strategy->setTargetActor($targetActor);
                $compiler = $this->getSupportingActorTemplateCompilerFactory()->create();
                $compiler->setSupportingActorTemplateTokenizer($tokenizer);
                $compiler->setSupportingActorTemplateCompilerStrategy($strategy);
                $writer = $this->getSupportingActorWriterFactory()->create();
                $writer->setSupportingActorTemplateCompiler($compiler);
                $writer->setTargetApplication($this->getTargetApplication());
                $writer->write();
            }
        }

        return $this;
    }

    protected function getFabricateYamlFiles(): array
    {
        if ($this->fabricate_yaml_files === null) {
            $finder = $this->getFinder()->in($this->getTargetApplication()->getSourcePath());
            $finder->name('*' . FabricationFileInterface::FILE_EXTENSION_FABRICATION);
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
