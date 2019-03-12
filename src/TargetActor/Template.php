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
    protected $template_tree_directory_path;
    protected $file_extension;
    protected $actor_template_file_path;
    protected $short_name;
    protected $looks_like_short_name;
    protected $looks_like_file_extension;

    public function getActorTemplateFilePath(): string
    {
        if ($this->actor_template_file_path === null) {
            $actorTemplateFilePathCandidate = sprintf(
                '%s/%s%s',
                $this->getTemplateTreeDirectoryPath(),
                $this->getFabricationFileActor()->getRelativeTemplatePath(),
                $this->getFileExtension()
            );
            $actorTemplateFilePath = realpath($actorTemplateFilePathCandidate);
            if ($actorTemplateFilePath === false) {
                throw new \RuntimeException(
                    sprintf('The actor template file[%s] does not exist.', $actorTemplateFilePathCandidate)
                );
            }
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

    public function getFileExtension(): string
    {
        if ($this->file_extension === null) {
            $this->file_extension = $this->getFabricationFileActor()->getTemplateFileExtension();
        }

        return $this->file_extension;
    }

    public function getLooksLikeShortName(): string
    {
        if ($this->looks_like_short_name === null) {
            $relativeTemplatePath = $this->getFabricationFileActor()->getLooksLikeRelativeTemplatePath();
            $looksLikeShortNamePosition = strrpos($relativeTemplatePath, "/");
            if ($looksLikeShortNamePosition === false) {
                $looksLikeShortNamePosition = 0;
            }
            $looksLikeShortName = str_replace('/', '', substr($relativeTemplatePath, $looksLikeShortNamePosition));
            $this->looks_like_short_name = $looksLikeShortName;
        }

        return $this->looks_like_short_name;
    }

    public function getLooksLikeFileExtension(): string
    {
        if ($this->looks_like_file_extension === null) {
            $this->looks_like_file_extension = $this->getFabricationFileActor()->getLooksLikeTemplateFileExtension();
        }

        return $this->looks_like_file_extension;
    }

    public function getContents(): string
    {
        if ($this->contents === null) {
            $this->contents = file_get_contents($this->getActorTemplateFilePath());
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

    public function getTemplateTreeDirectoryPath(): string
    {
        if ($this->template_tree_directory_path === null) {
            throw new \LogicException('Template template_tree_directory_path has not been set.');
        }

        return $this->template_tree_directory_path;
    }

    public function setTemplateTreeDirectoryPath(string $template_tree_directory_path): TemplateInterface
    {
        if ($this->template_tree_directory_path !== null) {
            throw new \LogicException('Template template_tree_directory_path is already set.');
        }

        $this->template_tree_directory_path = $template_tree_directory_path;

        return $this;
    }
}
