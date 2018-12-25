<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\AnnotationProcessor\MapInterface;

interface SupportingActorInterface
{
    public function getRelativeTemplatePath(): string;

    public function setRelativeTemplatePath(string $relative_template_path): SupportingActorInterface;

    public function setTemplateFileExtension($template_file_extension): SupportingActorInterface;

    public function getTemplateFileExtension();

    public function setAnnotationProcessorMap(MapInterface $AnnotationProcessors);

    public function getAnnotationProcessorMap(): MapInterface;

    public function hasAnnotationProcessorMap(): bool;
}
