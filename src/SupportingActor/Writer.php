<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor;

use LogicException;
use Neighborhoods\Bradfab\ActorInterface;
use Neighborhoods\Bradfab\FabricationFile\SupportingActorInterface;
use Neighborhoods\Bradfab\SupportingActor;
use Neighborhoods\Bradfab\TargetApplication;
use Symfony\Component\Filesystem\Filesystem;

class Writer implements WriterInterface
{
    use SupportingActor\Template\Compiler\AwareTrait;
    use TargetApplication\AwareTrait;
    protected $filesystem;
    protected $target_actor_source_file_path;
    protected $target_actor_fabrication_file_path;
    protected $target_actor_template;
    protected $target_primary_actor;
    protected $FabricationFileActor;

    public function write(): WriterInterface
    {
        if (!is_file($this->getSupportingActorSourceFilePath())) {
            $targetActorFilePath = $this->getSupportingActorFabricationFilePath();
            $this->getFilesystem()->mkdir(dirname($targetActorFilePath));
            if (is_file($targetActorFilePath)) {
                $message = sprintf('Target actor with path[%s] already exists.', $targetActorFilePath);
                throw new LogicException($message);
            }
            $compiledContents = $this->getSupportingActorTemplateCompiler()->getCompiledContents();
            file_put_contents($targetActorFilePath, $compiledContents);
        }

        return $this;
    }


    public function getSupportingActorSourceFilePath(): string
    {
        if ($this->target_actor_source_file_path === null) {
            $sourceDirectoryPath = $this->getActor()->getSourceDirectoryPath();
            $actor = $this->getSupportingActorTemplate()->getFabricationFileSupportingActor();
            $actorRelativeFilePathPosition = str_replace(
                'Actor/',
                sprintf('%s/', $this->getActor()->getShortPascalCaseName()),
                $actor->getRelativeTemplatePath()
            );
            $fileExtension = $this->getSupportingActorTemplate()->getFileExtension();
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

    public function getSupportingActorFabricationFilePath()
    {
        if ($this->target_actor_fabrication_file_path === null) {
            $targetActorFabricationFilePath = str_replace(
                $this->getTargetApplication()->getSourceDirectoryPath(),
                $this->getTargetApplication()->getFabricationPath(),
                $this->getSupportingActorSourceFilePath()
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

    protected function getSupportingActorTemplate(): TemplateInterface
    {
        if ($this->target_actor_template === null) {
            $this->target_actor_template = $this->getSupportingActorTemplateCompiler()
                ->getSupportingActorTemplateTokenizer()
                ->getSupportingActorTemplate();
        }

        return $this->target_actor_template;
    }

    protected function getActor(): ActorInterface
    {
        if ($this->target_primary_actor === null) {
            $this->target_primary_actor = $this->getSupportingActorTemplateCompiler()
                ->getSupportingActorTemplateCompilerStrategy()
                ->getActor();
        }

        return $this->target_primary_actor;
    }

    public function getFabricationFileActor(): SupportingActorInterface
    {
        if ($this->FabricationFileActor === null) {
            $this->FabricationFileActor = $this->getSupportingActorTemplate()
                ->getFabricationFileSupportingActor();
        }

        return $this->FabricationFileActor;
    }
}
