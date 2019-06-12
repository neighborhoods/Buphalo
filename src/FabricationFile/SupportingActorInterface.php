<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile;

use Neighborhoods\Bradfab\AnnotationProcessor\MapInterface;

interface SupportingActorInterface extends GenericActorInterface
{
    public function getRelativeTemplatePath(): string;

    public function setRelativeTemplatePath(string $RelativeTemplatePath): SupportingActorInterface;

    public function setTemplateFileExtension(string $TemplateFileExtension): SupportingActorInterface;

    public function getTemplateFileExtension(): string;

    public function setAnnotationProcessorMap(MapInterface $AnnotationProcessors);

    public function getAnnotationProcessorMap(): MapInterface;

    public function hasAnnotationProcessorMap(): bool;

    public function setAsRelativeTemplatePath(string $AsRelativeTemplatePath): SupportingActorInterface;

    public function getAsRelativeTemplatePath(): string;

    public function setAsTemplateFileExtension(string $AsTemplateFileExtension): SupportingActorInterface;

    public function getAsTemplateFileExtension(): string;

    public function hasAsTemplateFileExtension(): bool;

    public function hasAsRelativeTemplatePath(): bool;
}
