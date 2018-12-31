<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor;

use Neighborhoods\Bradfab\FabricationFile;

class Template implements TemplateInterface
{
    use FabricationFile\Actor\AwareTrait {
        getFabricationFileActor as public;
    }

    protected $contents;
    protected $template_actor_directory_path;
    protected $file_extension;

    public function getContents(): string
    {
        if ($this->contents === null) {
            $actorTemplateFilePath = realpath(
                $this->getTemplateActorDirectoryPath()
                . '/'
                . str_replace('\\', '/', $this->getFabricationFileActor()->getRelativeTemplatePath())
                . $this->getFileExtension()
            );
            $this->contents = file_get_contents($actorTemplateFilePath);
        }

        return $this->contents;
    }

    public function updateContents(string $contents): TemplateInterface
    {
        if ($this->contents === null) {
            throw new \LogicException('Template contents has not been set.');
        }

        $this->contents = $contents;

        return $this;
    }

    public function getTemplateActorDirectoryPath(): string
    {
        if ($this->template_actor_directory_path === null) {
            throw new \LogicException('Template template_actor_directory_path has not been set.');
        }

        return $this->template_actor_directory_path;
    }

    public function setTemplateActorDirectoryPath(string $template_actor_directory_path): TemplateInterface
    {
        if ($this->template_actor_directory_path !== null) {
            throw new \LogicException('Template template_actor_directory_path is already set.');
        }

        $this->template_actor_directory_path = $template_actor_directory_path;

        return $this;
    }

    public function getFileExtension(): string
    {
        if ($this->file_extension === null) {
            $this->file_extension = $this->getFabricationFileActor()->getTemplateFileExtension();
        }

        return $this->file_extension;
    }
}
