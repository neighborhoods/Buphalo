<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor;

use Rhift\Bradfab\FabricationFile;

class Template implements TemplateInterface
{
    use FabricationFile\SupportingActor\AwareTrait {
        getFabricationFileSupportingActor as public;
    }

    protected $contents;
    protected $template_actor_directory_path;
    protected $file_extension;

    public function getContents(): string
    {
        if ($this->contents === null) {
            $supportingActorTemplateFilePath = realpath(
                $this->getTemplateActorDirectoryPath()
                . '/'
                . str_replace('\\', '/', $this->getFabricationFileSupportingActor()->getRelativeClassName())
                . $this->getFileExtension()
            );
            $this->contents = file_get_contents($supportingActorTemplateFilePath);
        }

        return $this->contents;
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
            throw new \LogicException('Template file_extension has not been set.');
        }

        return $this->file_extension;
    }

    public function setFileExtension(string $file_extension): TemplateInterface
    {
        if ($this->file_extension !== null) {
            throw new \LogicException('Template file_extension is already set.');
        }

        $this->file_extension = $file_extension;

        return $this;
    }
}
