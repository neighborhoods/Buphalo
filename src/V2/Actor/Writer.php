<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor;

use LogicException;
use Neighborhoods\Buphalo\V2\Actor;
use Symfony\Component\Filesystem\Filesystem;
use function dirname;

class Writer implements WriterInterface
{
    use Actor\Template\Compiler\AwareTrait;

    protected $filesystem;
    protected $ignore_source_directory_files;

    public function write(): WriterInterface
    {
        $actor = $this->getActorTemplateCompiler()->getActorTemplateTokenizer()->getActor();
        if ($this->getIgnoreSourceDirectoryFiles() || !is_file($actor->getSourceFilePath())) {
            $fabricationFilePath = $actor->getFabricationFilePath();
            $this->getFilesystem()->mkdir(dirname($fabricationFilePath));
            if (is_file($fabricationFilePath)) {
                $message = sprintf('Actor with fabrication file path [%s] already exists.', $fabricationFilePath);
                throw new LogicException($message);
            }
            $compiledContents = $this->getActorTemplateCompiler()->getCompiledContents();
            file_put_contents($fabricationFilePath, $compiledContents);
        }

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

    protected function getIgnoreSourceDirectoryFiles(): bool
    {
        if ($this->ignore_source_directory_files === null) {
            throw new LogicException('Writer ignore_source_directory_files has not been set.');
        }

        return $this->ignore_source_directory_files;
    }

    public function setIgnoreSourceDirectoryFiles(bool $ignoreSourceDirectoryFiles)
    {
        if ($this->ignore_source_directory_files !== null) {
            throw new \LogicException('Writer ignore_source_directory_files is already set.');
        }

        $this->ignore_source_directory_files = $ignoreSourceDirectoryFiles;

        return $this;
    }
}
