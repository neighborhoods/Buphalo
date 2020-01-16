<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

use Neighborhoods\Buphalo\V1\FabricationFile\Actor;

interface FabricationFileInterface
{
    public const FILE_EXTENSION_FABRICATION = 'buphalo.v1.fabrication.yml';
    public const KEY_PREFERRED_TEMPLATE_TREES = 'preferredTemplateTrees';

    public function getActors(): Actor\MapInterface;

    public function setActors(Actor\MapInterface $Actors): FabricationFileInterface;

    public function getFileName(): string;

    public function setFileName(string $FileName): FabricationFileInterface;

    public function getFilePath(): string;

    public function setRelativeFilePath(string $RelativeFilePath): FabricationFileInterface;

    public function setFilePath(string $FilePath): FabricationFileInterface;

    public function getRelativeFilePath(): string;

    public function setRelativeDirectoryPath(string $RelativeDirectoryPath): FabricationFileInterface;

    public function getRelativeDirectoryPath(): string;

    public function getBaseName(): string;

    public function setBaseName(string $BaseName): FabricationFileInterface;

    public function getDirectoryPath(): string;

    public function setDirectoryPath(string $DirectoryPath): FabricationFileInterface;

    public function getPreferredTemplateTrees(): array;

    public function hasPreferredTemplateTrees(): bool;

    public function setPreferredTemplateTrees(string ...$PreferredTemplateTrees): FabricationFileInterface;
}
