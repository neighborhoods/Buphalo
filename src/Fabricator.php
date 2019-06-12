<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use LogicException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class Fabricator implements FabricatorInterface
{
    use FabricationFile\Builder\Factory\AwareTrait;
    use Actor\Template\Factory\AwareTrait;
    use Actor\Template\Tokenizer\Factory\AwareTrait;
    use Actor\Template\Compiler\Factory\AwareTrait;
    use Actor\Template\Compiler\Strategy\Factory\AwareTrait;
    use Actor\Builder\Factory\AwareTrait;
    use SupportingActor\Factory\AwareTrait;
    use Actor\Writer\Factory\AwareTrait;
    use TargetApplication\AwareTrait;

    protected $Finder;
    protected $FabricateYamlFiles;
    protected $Filesystem;
    protected $TemplateTreeDirectoryPath;

    public function fabricate(): FabricatorInterface
    {
        $this->removeFabricationDirectory();
        /** @var SplFileInfo $fabricationFileSplFileInfo */
        foreach ($this->getFabricationYamlFiles() as $fabricationFilePath => $fabricationFileSplFileInfo) {
            $fabricationFileBuilder = $this->getFabricationFileBuilderFactory()->create();
            $fabricationFile = $fabricationFileBuilder->setSplFileInfo($fabricationFileSplFileInfo)->build();
            foreach ($fabricationFile->getActors() as $fabricationFileActor) {
                $actorBuilder = $this->getActorBuilderFactory()->create();
                $actorBuilder->setFabricationFile($fabricationFile);
                $actorBuilder->setFabricationFileActor($fabricationFileActor);
                $actorBuilder->setTargetApplication($this->getTargetApplication());
                $actor = $actorBuilder->build();
                //$template = $this->getActorTemplateFactory()->create();
                //$template->setFabricationFileActor($fabricationFileActor);
                //$template->setTemplateTreeDirectoryPath($this->getTemplateTreeDirectoryPath());
                //$tokenizer = $this->getActorTemplateTokenizerFactory()->create();
                //$tokenizer->setActorTemplate($template);
                //$strategy = $this->getActorTemplateCompilerStrategyFactory()->create();
                //$strategy->setFabricationFileActor($fabricationFileActor);
                //$strategy->setActor($actor);
                //$compiler = $this->getActorTemplateCompilerFactory()->create();
                //$compiler->setActorTemplateTokenizer($tokenizer);
                //$compiler->setActorTemplateCompilerStrategy($strategy);
                //$writer = $this->getActorWriterFactory()->create();
                //$writer->setActorTemplateCompiler($compiler);
                //$writer->setTargetApplication($this->getTargetApplication());
                //$writer->write();
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

    protected function getFabricationYamlFiles(): array
    {
        if ($this->FabricateYamlFiles === null) {
            // @Please change this and get|setFinder to a Finder\Builder & Finder\Builder\Factory.
            $finder = $this->getFinder()->in($this->getTargetApplication()->getSourceDirectoryPath());
//            $finder->name('*' . FabricationFileInterface::FILE_EXTENSION_FABRICATION);
            $finder->files()->name('Test.fabrication.yml');

            /** @var $file SplFileInfo */
            foreach ($finder as $directoryPath => $file) {
                $pathname = $file->getPathname();
                if (isset($this->FabricateYamlFiles[$pathname])) {
                    $message = sprintf('Fabricate YAML file with pathname[%s] is already set.', $pathname);
                    throw new LogicException($message);
                }
                $this->FabricateYamlFiles[$pathname] = $file;
            }
        }

        return $this->FabricateYamlFiles;
    }

    protected function getFinder(): Finder
    {
        if ($this->Finder === null) {
            throw new LogicException('Bradfab Finder has not been set.');
        }

        return $this->Finder;
    }

    public function setFinder(Finder $finder): FabricatorInterface
    {
        if ($this->Finder !== null) {
            throw new LogicException('Bradfab Finder is already set.');
        }
        $this->Finder = $finder;

        return $this;
    }

    public function getFilesystem(): Filesystem
    {
        if ($this->Filesystem === null) {
            throw new LogicException('Bradfab Filesystem has not been set.');
        }

        return $this->Filesystem;
    }

    public function setFilesystem(Filesystem $filesystem): FabricatorInterface
    {
        if ($this->Filesystem !== null) {
            throw new LogicException('Bradfab Filesystem is already set.');
        }

        $this->Filesystem = $filesystem;

        return $this;
    }

    public function getTemplateTreeDirectoryPath(): string
    {
        if ($this->TemplateTreeDirectoryPath === null) {
            throw new LogicException('Bradfab TemplateTreeDirectoryPath has not been set.');
        }

        return $this->TemplateTreeDirectoryPath;
    }

    public function setTemplateTreeDirectoryPath(string $template_tree_directory_path): FabricatorInterface
    {
        if ($this->TemplateTreeDirectoryPath !== null) {
            throw new LogicException('Bradfab TemplateTreeDirectoryPath is already set.');
        }

        $this->TemplateTreeDirectoryPath = $template_tree_directory_path;

        return $this;
    }
}
