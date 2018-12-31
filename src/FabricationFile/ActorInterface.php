<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile;

use Neighborhoods\Bradfab\AnnotationProcessor\MapInterface;

interface ActorInterface
{
    public function getRelativeTemplatePath(): string;

    public function setRelativeTemplatePath(string $relative_template_path): ActorInterface;

    public function setTemplateFileExtension($template_file_extension): ActorInterface;

    public function getTemplateFileExtension();

    public function setAnnotationProcessorMap(MapInterface $AnnotationProcessors);

    public function getAnnotationProcessorMap(): MapInterface;

    public function hasAnnotationProcessorMap(): bool;
}
