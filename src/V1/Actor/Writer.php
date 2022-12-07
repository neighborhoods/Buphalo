<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor;
use Symfony\Component\Filesystem\Filesystem;

use function dirname;

class Writer implements WriterInterface
{
    use Actor\Template\Compiler\AwareTrait;

    private $filesystem;

    private $source_override_behavior;

    public function write(): WriterInterface
    {
        $actor = $this->getActorTemplateCompiler()->getActorTemplateTokenizer()->getActor();
        if (is_file($actor->getSourceFilePath())) {
            switch ($this->getSourceOverrideBehavior()) {
                case WriterInterface::SOURCE_OVERRIDE_BEHAVIOR_SKIP:
                    return $this;
                case WriterInterface::SOURCE_OVERRIDE_BEHAVIOR_THROW:
                    throw new \RuntimeException(sprintf('File `%s` already exists.', $actor->getSourceFilePath()));
                case WriterInterface::SOURCE_OVERRIDE_BEHAVIOR_WRITE:
                    break; // continue on
                default:
                    throw new \LogicException(
                        sprintf('Invalid Source-Override Behavior: `%s`', $this->getSourceOverrideBehavior())
                    );
            }
        }

        $fabricationFilePath = $actor->getFabricationFilePath();
        $this->getFilesystem()->mkdir(dirname($fabricationFilePath));
        if (is_file($fabricationFilePath)) {
            $message = sprintf('Actor with fabrication file path [%s] already exists.', $fabricationFilePath);
            throw new LogicException($message);
        }
        $compiledContents = $this->getActorTemplateCompiler()->getCompiledContents();
        file_put_contents($fabricationFilePath, $compiledContents);

        return $this;
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

    public function setSourceOverrideBehavior($source_override_behavior): WriterInterface
    {
        if ($this->source_override_behavior !== null) {
            throw new LogicException('Writer source_override_behavior is already set.');
        }

        $this->source_override_behavior = $source_override_behavior;

        return $this;
    }

    private function getSourceOverrideBehavior()
    {
        if ($this->source_override_behavior === null) {
            throw new \LogicException('Writer source_override_behavior has not been set.');
        }

        return $this->source_override_behavior;
    }
}
