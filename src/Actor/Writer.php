<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use LogicException;
use Neighborhoods\Bradfab\Actor;
use Neighborhoods\Bradfab\ActorInterface;
use Neighborhoods\Bradfab\FabricationFile;
use Neighborhoods\Bradfab\TargetApplication;
use Symfony\Component\Filesystem\Filesystem;

class Writer implements WriterInterface
{
    use Actor\Template\Compiler\AwareTrait;
    use TargetApplication\AwareTrait;
    protected $filesystem;
    protected $target_actor_source_file_path;
    protected $target_actor_fabrication_file_path;
    protected $TargetActorTemplate;
    protected $target_primary_actor;
    protected $FabricationFileActor;

    public function write(): WriterInterface
    {
        if (!is_file($this->getActorSourceFilePath())) {
            $targetActorFilePath = $this->getActorFabricationFilePath();
            $this->getFilesystem()->mkdir(dirname($targetActorFilePath));
            if (is_file($targetActorFilePath)) {
                $message = sprintf('Target actor with path[%s] already exists.', $targetActorFilePath);
                throw new LogicException($message);
            }
            $compiledContents = $this->getActorTemplateCompiler()->getCompiledContents();
            file_put_contents($targetActorFilePath, $compiledContents);
        }

        return $this;
    }


    public function getActorSourceFilePath(): string
    {
        if ($this->target_actor_source_file_path === null) {
            $sourceDirectoryPath = $this->getActor()->getSourceDirectoryPath();
            $actor = $this->getActorTemplate()->getFabricationFileActor();
            $actorRelativeFilePathPosition = str_replace(
                'Actor/',
                sprintf('%s/', $this->getActor()->getShortPascalCaseName()),
                $actor->getGenerateRelativeDirectoryPath()
            );
            $fileExtension = $this->getActorTemplate()->getFileExtension();
            $targetActorSourceFilePath = sprintf(
                '%s/%s%s',
                $sourceDirectoryPath,
                $actorRelativeFilePathPosition,
                $fileExtension
            );
            $this->target_actor_source_file_path = $targetActorSourceFilePath;
        }

        return $this->target_actor_source_file_path;
    }

    public function getActorFabricationFilePath(): string
    {
        if ($this->target_actor_fabrication_file_path === null) {
            $targetActorFabricationFilePath = str_replace(
                $this->getTargetApplication()->getSourceDirectoryPath(),
                $this->getTargetApplication()->getFabricationPath(),
                $this->getActorSourceFilePath()
            );
            $this->target_actor_fabrication_file_path = $targetActorFabricationFilePath;
        }

        return $this->target_actor_fabrication_file_path;
    }

    protected function getFilesystem(): Filesystem
    {
        if ($this->filesystem === null) {
            throw new LogicException('Writer filesystem has not been set.');
        }

        return $this->filesystem;
    }

    public function setFilesystem(Filesystem $filesystem): WriterInterface
    {
        if ($this->filesystem !== null) {
            throw new LogicException('Writer filesystem is already set.');
        }

        $this->filesystem = $filesystem;

        return $this;
    }

    protected function getActorTemplate(): TemplateInterface
    {
        if ($this->TargetActorTemplate === null) {
            $this->TargetActorTemplate = $this->getActorTemplateCompiler()
                ->getActorTemplateTokenizer()
                ->getActorTemplate();
        }

        return $this->TargetActorTemplate;
    }

    protected function getActor(): ActorInterface
    {
        if ($this->target_primary_actor === null) {
            $this->target_primary_actor = $this->getActorTemplateCompiler()
                ->getActorTemplateCompilerStrategy()
                ->getActor();
        }

        return $this->target_primary_actor;
    }

    public function getFabricationFileActor(): FabricationFile\ActorInterface
    {
        if ($this->FabricationFileActor === null) {
            $this->FabricationFileActor = $this->getActorTemplate()
                ->getFabricationFileActor();
        }

        return $this->FabricationFileActor;
    }
}
