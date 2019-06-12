<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor;

use LogicException;
use Neighborhoods\Bradfab\FabricationFile;
use RuntimeException;

class Template implements TemplateInterface
{
    use FabricationFile\SupportingActor\AwareTrait {
        getFabricationFileSupportingActor as public;
    }

    protected $Contents;
    protected $TemplateTreeDirectoryPath;
    protected $FileExtension;
    protected $ActorTemplateFilePath;
    protected $ShortPascalCaseName;
    protected $LooksLikeShortName;
    protected $LooksLikeFileExtension;

    public function getActorTemplateFilePath(): string
    {
        if ($this->ActorTemplateFilePath === null) {
            $actorTemplateFilePathCandidate = sprintf(
                '%s/%s%s',
                $this->getTemplateTreeDirectoryPath(),
                $this->getFabricationFileSupportingActor()->getRelativeTemplatePath(),
                $this->getFileExtension()
            );
            $actorTemplateFilePath = realpath($actorTemplateFilePathCandidate);
            if ($actorTemplateFilePath === false) {
                throw new RuntimeException(
                    sprintf('The actor template file[%s] does not exist.', $actorTemplateFilePathCandidate)
                );
            }
            $this->ActorTemplateFilePath = $actorTemplateFilePath;
        }

        return $this->ActorTemplateFilePath;
    }

    public function getPascalCaseName(): string
    {
        if ($this->ShortPascalCaseName === null) {
            $relativeTemplatePath = $this->getFabricationFileSupportingActor()->getRelativeTemplatePath();
            $shortNamePosition = strrpos($relativeTemplatePath, '/');
            if ($shortNamePosition === false) {
                $shortNamePosition = 0;
            }
            $shortName = str_replace('/', '', substr($relativeTemplatePath, $shortNamePosition));
            $this->ShortPascalCaseName = $shortName;
        }

        return $this->ShortPascalCaseName;
    }

    public function getFileExtension(): string
    {
        if ($this->FileExtension === null) {
            $this->FileExtension = $this->getFabricationFileSupportingActor()->getTemplateFileExtension();
        }

        return $this->FileExtension;
    }

    public function getLooksLikeShortPascalCaseName(): string
    {
        if ($this->LooksLikeShortName === null) {
            $relativeTemplatePath = $this->getFabricationFileSupportingActor()->getAsRelativeTemplatePath();
            $looksLikeShortNamePosition = strrpos($relativeTemplatePath, '/');
            if ($looksLikeShortNamePosition === false) {
                $looksLikeShortNamePosition = 0;
            }
            $looksLikeShortName = str_replace('/', '', substr($relativeTemplatePath, $looksLikeShortNamePosition));
            $this->LooksLikeShortName = $looksLikeShortName;
        }

        return $this->LooksLikeShortName;
    }

    public function getLooksLikeFileExtension(): string
    {
        if ($this->LooksLikeFileExtension === null) {
            $this->LooksLikeFileExtension = $this->getFabricationFileSupportingActor()->getAsTemplateFileExtension();
        }

        return $this->LooksLikeFileExtension;
    }

    public function getContents(): string
    {
        if ($this->Contents === null) {
            $this->Contents = file_get_contents($this->getActorTemplateFilePath());
        }

        return $this->Contents;
    }

    public function updateContents(string $contents): TemplateInterface
    {
        if ($this->Contents === null) {
            throw new LogicException('Template contents has not been set.');
        }

        $this->Contents = $contents;

        return $this;
    }

    public function getTemplateTreeDirectoryPath(): string
    {
        if ($this->TemplateTreeDirectoryPath === null) {
            throw new LogicException('Template template_tree_directory_path has not been set.');
        }

        return $this->TemplateTreeDirectoryPath;
    }

    public function setTemplateTreeDirectoryPath(string $template_tree_directory_path): TemplateInterface
    {
        if ($this->TemplateTreeDirectoryPath !== null) {
            throw new LogicException('Template template_tree_directory_path is already set.');
        }

        $this->TemplateTreeDirectoryPath = $template_tree_directory_path;

        return $this;
    }
}
