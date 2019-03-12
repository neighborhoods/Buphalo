<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile;

use Neighborhoods\Bradfab\AnnotationProcessor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class Actor implements ActorInterface
{
    use AnnotationProcessor\Map\AwareTrait {
        getAnnotationProcessorMap as public;
        hasAnnotationProcessorMap as public;
    }

    protected $relative_template_path;
    protected $template_file_extension;
    protected $looks_like_template_file_extension;
    protected $looks_like_relative_template_path;

    public function getRelativeTemplatePath(): string
    {
        if ($this->relative_template_path === null) {
            throw new \LogicException('Actor relative_template_path has not been set.');
        }

        return $this->relative_template_path;
    }

    public function setRelativeTemplatePath(string $relative_template_path): ActorInterface
    {
        if ($this->relative_template_path !== null) {
            throw new \LogicException('Actor relative_template_path is already set.');
        }

        $this->relative_template_path = $relative_template_path;

        return $this;
    }

    public function getTemplateFileExtension()
    {
        if ($this->template_file_extension === null) {
            throw new \LogicException('Actor template_file_extension has not been set.');
        }

        return $this->template_file_extension;
    }

    public function setTemplateFileExtension($template_file_extension): ActorInterface
    {
        if ($this->template_file_extension !== null) {
            throw new \LogicException('Actor template_file_extension is already set.');
        }

        $this->template_file_extension = $template_file_extension;

        return $this;
    }

    public function getLooksLikeTemplateFileExtension(): string
    {
        if ($this->looks_like_template_file_extension === null) {
            throw new \LogicException('Actor looks_like_template_file_extension has not been set.');
        }

        return $this->looks_like_template_file_extension;
    }

    public function setLooksLikeTemplateFileExtension(string $looks_like_template_file_extension): ActorInterface
    {
        if ($this->looks_like_template_file_extension !== null) {
            throw new \LogicException('Actor looks_like_template_file_extension is already set.');
        }

        $this->looks_like_template_file_extension = $looks_like_template_file_extension;

        return $this;
    }

    public function hasLooksLikeTemplateFileExtension(): bool
    {
        return $this->looks_like_template_file_extension !== null;
    }

    public function getLooksLikeRelativeTemplatePath(): string
    {
        if ($this->looks_like_relative_template_path === null) {
            throw new \LogicException('Actor looks_like_relative_template_path has not been set.');
        }

        return $this->looks_like_relative_template_path;
    }

    public function setLooksLikeRelativeTemplatePath(string $looks_like_relative_template_path): ActorInterface
    {
        if ($this->looks_like_relative_template_path !== null) {
            throw new \LogicException('Actor looks_like_relative_template_path is already set.');
        }

        $this->looks_like_relative_template_path = $looks_like_relative_template_path;

        return $this;
    }

    public function hasLooksLikeRelativeTemplatePath(): bool
    {
        return $this->looks_like_relative_template_path !== null;
    }
}
