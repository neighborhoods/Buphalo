<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor;

use LogicException;
use Neighborhoods\Buphalo\Actor;
use Symfony\Component\Filesystem\Filesystem;

class Writer implements WriterInterface
{
    use Actor\Template\Compiler\AwareTrait;

    protected $filesystem;

    public function write(): WriterInterface
    {
        $actor = $this->getActorTemplateCompiler()->getActorTemplateTokenizer()->getActor();
        if (!is_file($actor->getSourceFilePath())) {
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
}
