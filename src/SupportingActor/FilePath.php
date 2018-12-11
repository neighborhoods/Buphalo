<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor;

class FilePath implements FilePathInterface
{
    /** @var string */
    protected $fabricate_yaml_file_path;
    /** @var string */
    protected $supporting_actor_key;
    /** @var string */
    protected $file_extension;
    /** @var string */
    protected $template_actor_directory_path;

    public function get(): string
    {
        $supportingActorTemplateFilePath = realpath(
            $this->getTemplateActorDirectoryPath()
            . '/'
            . str_replace('\\', '/', $this->getSupportingActorKey())
            . $this->getFileExtension()
        );
        $supportingActorTemplate = file_get_contents($supportingActorTemplateFilePath);
        $supportingActorTemplate = str_replace(
            'Rhift\Bradfab\Template\Actor',
            $actorNameSpace,
            $supportingActorTemplate
        );

        return $supportingActorTemplate;
    }

    public function setTemplateActorDirectoryPath(string $template_actor_directory_path): FilePathInterface
    {
        if ($this->template_actor_directory_path !== null) {
            throw new \LogicException('FilePath template_actor_directory_path is already set.');
        }

        $this->template_actor_directory_path = $template_actor_directory_path;

        return $this;
    }

    public function getTemplateActorDirectoryPath(): string
    {
        if ($this->template_actor_directory_path === null) {
            throw new \LogicException('FilePath template_actor_directory_path has not been set.');
        }

        return $this->template_actor_directory_path;
    }

    public function getFabricateYamlFilePath(): string
    {
        if ($this->fabricate_yaml_file_path === null) {
            throw new \LogicException('FilePath fabricate_yaml_file_path has not been set.');
        }

        return $this->fabricate_yaml_file_path;
    }

    public function setFabricateYamlFilePath(string $fabricate_yaml_file_path): FilePathInterface
    {
        if ($this->fabricate_yaml_file_path !== null) {
            throw new \LogicException('FilePath fabricate_yaml_file_path is already set.');
        }

        $this->fabricate_yaml_file_path = $fabricate_yaml_file_path;

        return $this;
    }

    public function getSupportingActorKey(): string
    {
        if ($this->supporting_actor_key === null) {
            throw new \LogicException('FilePath supporting_actor_key has not been set.');
        }

        return $this->supporting_actor_key;
    }

    public function setSupportingActorKey(string $supporting_actor_key): FilePathInterface
    {
        if ($this->supporting_actor_key !== null) {
            throw new \LogicException('FilePath supporting_actor_key is already set.');
        }

        $this->supporting_actor_key = $supporting_actor_key;

        return $this;
    }

    public function getFileExtension(): string
    {
        if ($this->file_extension === null) {
            throw new \LogicException('FilePath file_extension has not been set.');
        }

        return $this->file_extension;
    }

    public function setFileExtension(string $file_extension): FilePathInterface
    {
        if ($this->file_extension !== null) {
            throw new \LogicException('FilePath file_extension is already set.');
        }

        $this->file_extension = $file_extension;

        return $this;
    }
}
