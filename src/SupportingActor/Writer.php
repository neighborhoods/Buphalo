<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor;

use Rhift\Bradfab\SupportingActor;
use Symfony\Component\Filesystem\Filesystem;
use Rhift\Bradfab\TargetApplication;

class Writer implements WriterInterface
{
    use SupportingActor\Template\Compiler\AwareTrait;
    use TargetApplication\AwareTrait;
    protected $filesystem;
    protected $supporting_actor_source_file_path;
    protected $supporting_actor_fabrication_file_path;
    protected $supporting_actor_template;
    protected $target_actor;

    public function write(): WriterInterface
    {
        if (!is_file($this->getSupportingActorSourceFilePath())) {
            $supportingActorFilePath = $this->getSupportingActorFabricationFilePath();
            $this->getFilesystem()->mkdir(dirname($supportingActorFilePath));
            if (is_file($supportingActorFilePath)) {
                $message = sprintf('Supporting actor with path[%s] already exists.', $supportingActorFilePath);
                throw new \LogicException($message);
            }
            $compiledContents = $this->getSupportingActorTemplateCompiler()->getCompiledContents();
            file_put_contents($supportingActorFilePath, $compiledContents);
        }

        return $this;
    }


    public function getSupportingActorSourceFilePath()
    {
        if ($this->supporting_actor_source_file_path === null) {
            $targetActorFilePathPosition = $this->getTargetActor()->getFilePathPosition();
            $supportingActor = $this->getSupportingActorTemplate()->getFabricationFileSupportingActor();
            $supportingActorRelativeFilePathPosition = str_replace('\\', '/', $supportingActor->getRelativeClassName());
            $fileExtension = $this->getSupportingActorTemplate()->getFileExtension();
            $this->supporting_actor_source_file_path = sprintf(
                '%s/%s%s',
                $targetActorFilePathPosition,
                $supportingActorRelativeFilePathPosition,
                $fileExtension
            );
        }

        return $this->supporting_actor_source_file_path;
    }


    public function getSupportingActorFabricationFilePath()
    {
        if ($this->supporting_actor_fabrication_file_path === null) {
            $this->supporting_actor_fabrication_file_path = str_replace(
                $this->getTargetApplication()->getSourcePath(),
                $this->getTargetApplication()->getFabricationPath(),
                $this->getSupportingActorSourceFilePath()
            );
        }

        return $this->supporting_actor_fabrication_file_path;
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

    protected function getSupportingActorTemplate()
    {
        if ($this->supporting_actor_template === null) {
            $this->supporting_actor_template = $this->getSupportingActorTemplateCompiler()
                ->getSupportingActorTemplateTokenizer()
                ->getSupportingActorTemplate();
        }

        return $this->supporting_actor_template;
    }

    protected function getTargetActor()
    {
        if ($this->target_actor === null) {
            $this->target_actor = $this->getSupportingActorTemplateCompiler()
                ->getSupportingActorTemplateCompilerStrategy()
                ->getTargetActor();
        }

        return $this->target_actor;
    }
}
