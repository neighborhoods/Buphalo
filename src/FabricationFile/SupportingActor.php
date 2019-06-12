<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile;

use LogicException;
use Neighborhoods\Bradfab\AnnotationProcessor;

/** @noinspection PhpSuperClassIncompatibleWithInterfaceInspection */
class SupportingActor implements SupportingActorInterface
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
            throw new LogicException('Actor relative_template_path has not been set.');
        }

        return $this->relative_template_path;
    }

    public function setRelativeTemplatePath(string $RelativeTemplatePath): SupportingActorInterface
    {
        if ($this->relative_template_path !== null) {
            throw new LogicException('Actor relative_template_path is already set.');
        }

        $this->relative_template_path = $RelativeTemplatePath;

        return $this;
    }

    public function getTemplateFileExtension(): string
    {
        if ($this->template_file_extension === null) {
            throw new LogicException('Actor template_file_extension has not been set.');
        }

        return $this->template_file_extension;
    }

    public function setTemplateFileExtension(string $TemplateFileExtension): SupportingActorInterface
    {
        if ($this->template_file_extension !== null) {
            throw new LogicException('Actor template_file_extension is already set.');
        }

        $this->template_file_extension = $TemplateFileExtension;

        return $this;
    }

    public function getAsTemplateFileExtension(): string
    {
        if ($this->looks_like_template_file_extension === null) {
            throw new LogicException('Actor looks_like_template_file_extension has not been set.');
        }

        return $this->looks_like_template_file_extension;
    }

    public function setAsTemplateFileExtension(string $AsTemplateFileExtension): SupportingActorInterface
    {
        if ($this->looks_like_template_file_extension !== null) {
            throw new LogicException('Actor looks_like_template_file_extension is already set.');
        }

        $this->looks_like_template_file_extension = $AsTemplateFileExtension;

        return $this;
    }

    public function hasAsTemplateFileExtension(): bool
    {
        return $this->looks_like_template_file_extension !== null;
    }

    public function getAsRelativeTemplatePath(): string
    {
        if ($this->looks_like_relative_template_path === null) {
            throw new LogicException('Actor looks_like_relative_template_path has not been set.');
        }

        return $this->looks_like_relative_template_path;
    }

    public function setAsRelativeTemplatePath(string $AsRelativeTemplatePath): SupportingActorInterface
    {
        if ($this->looks_like_relative_template_path !== null) {
            throw new LogicException('Actor looks_like_relative_template_path is already set.');
        }

        $this->looks_like_relative_template_path = $AsRelativeTemplatePath;

        return $this;
    }

    public function hasAsRelativeTemplatePath(): bool
    {
        return $this->looks_like_relative_template_path !== null;
    }

    public function setGenerateFileName(string $GenerateFileName): ActorInterface
    {
        // TODO: Implement setGeneratedFileName() method.
        throw new LogicException('Unimplemented [setGeneratedFileName] method.');
    }

    public function getGenerateFileName(): string
    {
        // TODO: Implement getGeneratedFileName() method.
        throw new LogicException('Unimplemented [getGeneratedFileName] method.');
    }

    public function setTemplateFileName(string $TemplateFileName): ActorInterface
    {
        // TODO: Implement setTemplateFileName() method.
        throw new LogicException('Unimplemented [setTemplateFileName] method.');
    }

    public function getTemplateFileName(): string
    {
        // TODO: Implement getTemplateFileName() method.
        throw new LogicException('Unimplemented [getTemplateFileName] method.');
    }
}
