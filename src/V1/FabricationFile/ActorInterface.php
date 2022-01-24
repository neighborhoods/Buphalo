<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile;

use Neighborhoods\Buphalo\V1\AnnotationProcessor\MapInterface;

interface ActorInterface extends GenericActorInterface
{
    public function getRelativeDirectoryPath(): string;

    public function setRelativeDirectoryPath(string $RelativeDirectoryPath): ActorInterface;

    public function setFileExtension(string $FileExtension): ActorInterface;

    public function getFileExtension(): string;

    public function setAnnotationProcessorMap(MapInterface $AnnotationProcessors);

    public function getAnnotationProcessorMap(): MapInterface;

    public function hasAnnotationProcessorMap(): bool;

    public function setTemplateRelativeDirectoryPath(string $TemplateRelativeDirectoryPath): ActorInterface;

    public function getTemplateRelativeDirectoryPath(): string;

    public function setTemplateFileExtension(string $TemplateFileExtension): ActorInterface;

    public function getTemplateFileExtension(): string;

    public function getPreferredTemplateTrees(): iterable;

    public function hasPreferredTemplateTrees(): bool;

    public function setPreferredTemplateTrees(string ...$PreferredTemplateTrees): ActorInterface;

    public function setRelativeFilePath(string $RelativeFilePath): ActorInterface;

    public function getRelativeFilePath(): string;
}
