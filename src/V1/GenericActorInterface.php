<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

interface GenericActorInterface
{
    public function getRelativeClassPath(): string;

    public function getParentRelativeClassPath(): string;

    public function getNamespacePrefix(): string;

    public function getFullPascalCaseName(): string;

    public function getShortPascalCaseName(): string;

    public function getSourceDirectoryPath(): string;

    public function getSourceFilePath(): string;

    public function getFabricationDirectoryPath(): string;

    public function getFabricationFilePath(): string;

    public function setRelativeClassPath(string $RelativeClassPath): ActorInterface;

    public function setFullPascalCaseName(string $FullPascalCaseName): ActorInterface;

    public function setShortPascalCaseName(string $ShortPascalCaseName): ActorInterface;

    public function setNamespacePrefix(string $NamespacePrefix): ActorInterface;

    public function setParentRelativeClassPath(string $ParentRelativeClassPath): ActorInterface;

    public function setSourceDirectoryPath(string $SourceDirectoryPath): ActorInterface;

    public function setFabricationDirectoryPath(string $FabricationDirectoryPath): ActorInterface;

    public function setSourceFilePath(string $SourceFilePath): ActorInterface;

    public function setFileName(string $FileName): ActorInterface;

    public function getFileExtension(): string;

    public function setFileExtension(string $FileExtension): ActorInterface;

    public function getFileName(): string;

    public function setFabricationFilePath(string $FabricationFilePath): ActorInterface;

    public function getNamespaceRelative(): string;

    public function setNamespaceRelative(string $NamespaceRelative): ActorInterface;

    public function setPrimaryActorFullPascalCaseName(string $PrimaryActorFullPascalCaseName): ActorInterface;

    public function getPrimaryActorFullPascalCaseName(): string;

    public function setPrimaryActorShortPascalCaseName(string $PrimaryActorShortPascalCaseName): ActorInterface;

    public function getPrimaryActorShortPascalCaseName(): string;
}
