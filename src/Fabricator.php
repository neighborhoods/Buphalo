<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class Fabricator implements FabricatorInterface
{
    use FabricationFile\Builder\Factory\AwareTrait;
    use TargetActor\Template\Factory\AwareTrait;
    use TargetActor\Template\Tokenizer\Factory\AwareTrait;
    use TargetActor\Template\Compiler\Factory\AwareTrait;
    use TargetActor\Template\Compiler\Strategy\Factory\AwareTrait;
    use TargetPrimaryActor\Factory\AwareTrait;
    use TargetActor\Writer\Factory\AwareTrait;
    use TargetApplication\AwareTrait;
    protected $finder;
    protected $fabricate_yaml_files;
    protected $filesystem;
    protected $template_actor_directory_path;

    public function fabricate(): FabricatorInterface
    {
        $this->removeFabricationDirectory();
        /** @var SplFileInfo $fabricateYamlSPLFileInfo */
        foreach ($this->getFabricateYamlFiles() as $fabricateYamlFilePathname => $fabricateYamlSPLFileInfo) {
            $fabricationFileBuilder = $this->getFabricationFileBuilderFactory()->create();
            $fabricationFile = $fabricationFileBuilder->setSplFileInfo($fabricateYamlSPLFileInfo)->build();
            foreach ($fabricationFile->getActors() as $actor) {
                $targetPrimaryActor = $this->getTargetPrimaryActorFactory()->create();
                $targetPrimaryActor->setFabricationFile($fabricationFile);
                $targetPrimaryActor->setTargetApplication($this->getTargetApplication());
                $template = $this->getTargetActorTemplateFactory()->create();
                $template->setFabricationFileActor($actor);
                $template->setTemplateDirectoryPath($this->getTemplateActorDirectoryPath());
                $tokenizer = $this->getTargetActorTemplateTokenizerFactory()->create();
                $tokenizer->setTargetActorTemplate($template);
                $strategy = $this->getTargetActorTemplateCompilerStrategyFactory()->create();
                $strategy->setTargetPrimaryActor($targetPrimaryActor);
                $compiler = $this->getTargetActorTemplateCompilerFactory()->create();
                $compiler->setTargetActorTemplateTokenizer($tokenizer);
                $compiler->setTargetActorTemplateCompilerStrategy($strategy);
                $writer = $this->getTargetActorWriterFactory()->create();
                $writer->setTargetActorTemplateCompiler($compiler);
                $writer->setTargetApplication($this->getTargetApplication());
                $writer->write();
            }
        }

        return $this;
    }

    protected function removeFabricationDirectory(): FabricatorInterface
    {
        if ($this->getFilesystem()->exists($this->getTargetApplication()->getFabricationPath())) {
            $this->getFilesystem()->remove($this->getTargetApplication()->getFabricationPath());
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
