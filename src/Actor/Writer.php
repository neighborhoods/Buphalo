<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use LogicException;
use Neighborhoods\Bradfab\Actor;
use Neighborhoods\Bradfab\TargetApplication;
use Symfony\Component\Filesystem\Filesystem;

class Writer implements WriterInterface
{
    use Actor\Template\Compiler\AwareTrait;
    use Actor\AwareTrait;
    use TargetApplication\AwareTrait;

    protected $filesystem;
    protected $target_actor_source_file_path;
    protected $target_actor_fabrication_file_path;
    protected $TargetActorTemplate;
    protected $target_primary_actor;
    protected $FabricationFileActor;

    public function write(): WriterInterface
    {
        if (!is_file($this->getActor()->getSourceFilePath())) {
            $fabricationFilePath = $this->getActor()->getFabricationFilePath();
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
