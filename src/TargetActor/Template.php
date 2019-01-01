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
    protected $template_directory_path;
    protected $file_extension;
    protected $actor_template_file_path;
    protected $short_name;

    public function getContents(): string
    {
        if ($this->contents === null) {
            $this->contents = file_get_contents($this->getActorTemplateFilePath());
        }

        return $this->contents;
    }

    public function getActorTemplateFilePath(): string
    {
        if ($this->actor_template_file_path === null) {
            $actorTemplateFilePath = realpath(
                $this->getTemplateDirectoryPath()
                . '/'
                . $this->getFabricationFileActor()->getRelativeTemplatePath()
                . $this->getFileExtension()
            );
            $this->actor_template_file_path = $actorTemplateFilePath;
        }

        return $this->actor_template_file_path;
    }

    public function getShortName(): string
    {
        if ($this->short_name === null) {
            $relativeTemplatePath = $this->getFabricationFileActor()->getRelativeTemplatePath();
            $shortNamePosition = strrpos($relativeTemplatePath, "/");
            if ($shortNamePosition === false) {
                $shortNamePosition = 0;
            }
            $shortName = str_replace('/', '', substr($relativeTemplatePath, $shortNamePosition));
            $this->short_name = $shortName;
        }

        return $this->short_name;
    }

    public function updateContents(string $contents): TemplateInterface
    {
        if ($this->contents === null) {
            throw new \LogicException('Template contents has not been set.');
        }

        $this->contents = $contents;

        return $this;
    }

    public function getTemplateDirectoryPath(): string
    {
        if ($this->template_directory_path === null) {
            throw new \LogicException('Template template_directory_path has not been set.');
        }

        return $this->template_directory_path;
    }

    public function setTemplateDirectoryPath(string $template_directory_path): TemplateInterface
    {
        if ($this->template_directory_path !== null) {
            throw new \LogicException('Template template_directory_path is already set.');
        }

        $this->template_directory_path = $template_directory_path;

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
