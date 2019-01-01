<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor;

use Neighborhoods\Bradfab\TargetActor;
use Symfony\Component\Filesystem\Filesystem;
use Neighborhoods\Bradfab\TargetApplication;

class Writer implements WriterInterface
{
    use TargetActor\Template\Compiler\AwareTrait;
    use TargetApplication\AwareTrait;
    protected $filesystem;
    protected $target_actor_source_file_path;
    protected $target_actor_fabrication_file_path;
    protected $target_actor_template;
    protected $target_actor;
    protected $FabricationFileActor;

    public function write(): WriterInterface
    {
        if (!is_file($this->getTargetActorSourceFilePath())) {
            $targetActorFilePath = $this->getTargetActorFabricationFilePath();
            $this->getFilesystem()->mkdir(dirname($targetActorFilePath));
            if (is_file($targetActorFilePath)) {
                $message = sprintf('Target actor with path[%s] already exists.', $targetActorFilePath);
                throw new \LogicException($message);
            }
            $compiledContents = $this->getTargetActorTemplateCompiler()->getCompiledContents();
            file_put_contents($targetActorFilePath, $compiledContents);
        }

        return $this;
    }


    public function getTargetActorSourceFilePath()
    {
        if ($this->target_actor_source_file_path === null) {
            $targetActorFilePathPosition = $this->getTargetPrimaryActor()->getFilePathPosition();
            $actor = $this->getTargetActorTemplate()->getFabricationFileActor();
            $actorRelativeFilePathPosition = str_replace(
                'Actor/',
                '',
                $actor->getRelativeTemplatePath()
            );
            $fileExtension = $this->getTargetActorTemplate()->getFileExtension();
            $targetActorSourceFilePath = sprintf(
                '%s/%s%s',
                $targetActorFilePathPosition,
                $actorRelativeFilePathPosition,
                $fileExtension
            );
            $this->target_actor_source_file_path = $targetActorSourceFilePath;
        }

        return $this->target_actor_source_file_path;
    }


    public function getTargetActorFabricationFilePath()
    {
        if ($this->target_actor_fabrication_file_path === null) {
            $this->target_actor_fabrication_file_path = str_replace(
                $this->getTargetApplication()->getSourcePath(),
                $this->getTargetApplication()->getFabricationPath(),
                $this->getTargetActorSourceFilePath()
            );
        }

        return $this->target_actor_fabrication_file_path;
    }

    protected function getFilesystem(): Filesystem
    {
        if ($this->filesystem === null) {
            throw new \LogicException('Writer filesystem has not been set.');
        }

        return $this->filesystem;
    }

    public function setFilesystem(Filesystem $filesystem): WriterInterface
    {
        if ($this->filesystem !== null) {
            throw new \LogicException('Writer filesystem is already set.');
        }

        $this->filesystem = $filesystem;

        return $this;
    }

    protected function getTargetActorTemplate()
    {
        if ($this->target_actor_template === null) {
            $this->target_actor_template = $this->getTargetActorTemplateCompiler()
                ->getTargetActorTemplateTokenizer()
                ->getTargetActorTemplate();
        }

        return $this->target_actor_template;
    }

    protected function getTargetPrimaryActor()
    {
        if ($this->target_actor === null) {
            $this->target_actor = $this->getTargetActorTemplateCompiler()
                ->getTargetActorTemplateCompilerStrategy()
                ->getTargetPrimaryActor();
        }

        return $this->target_actor;
    }

    public function getFabricationFileActor()
    {
        if ($this->FabricationFileActor === null) {
            $this->FabricationFileActor = $this->getTargetActorTemplate()
                ->getFabricationFileActor();
        }

        return $this->FabricationFileActor;
    }
}
