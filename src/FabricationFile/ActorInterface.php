<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile;

use Neighborhoods\Bradfab\AnnotationProcessor\MapInterface;

interface ActorInterface extends GenericActorInterface
{
    public function getGenerateRelativeDirectoryPath(): string;

    public function setGenerateRelativeDirectoryPath(string $GenerateRelativeDirectoryPath): ActorInterface;

    public function setGenerateFileExtension(string $GenerateFileExtension): ActorInterface;

    public function getGenerateFileExtension(): string;

    public function setAnnotationProcessorMap(MapInterface $AnnotationProcessors);

    public function getAnnotationProcessorMap(): MapInterface;

    public function hasAnnotationProcessorMap(): bool;

    public function setTemplateRelativeDirectoryPath(string $TemplateRelativeDirectoryPath): ActorInterface;

    public function getTemplateRelativeDirectoryPath(): string;

    public function setTemplateFileExtension(string $TemplateFileExtension): ActorInterface;

    public function getTemplateFileExtension(): string;
}
