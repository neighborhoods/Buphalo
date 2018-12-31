<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use Neighborhoods\Bradfab\FabricationFile\Actor\MapInterface;

interface FabricationFileInterface
{
    public const FILE_EXTENSION_FABRICATION = '.fabrication.yml';

    public function getActors(): MapInterface;

    public function setActors(MapInterface $actors): FabricationFileInterface;

    public function getFileName(): string;

    public function setFileName(string $file_name): FabricationFileInterface;

    public function getFilePath(): string;

    public function setRelativeFilePath(string $relative_file_path): FabricationFileInterface;

    public function setFilePath(string $file_path): FabricationFileInterface;

    public function getRelativeFilePath(): string;

    public function setRelativeDirectoryPath(string $relative_directory_path): FabricationFileInterface;

    public function getRelativeDirectoryPath(): string;
}
