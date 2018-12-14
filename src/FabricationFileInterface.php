<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Rhift\Bradfab\FabricationFile\SupportingActor\MapInterface;

interface FabricationFileInterface
{
    public function getSupportingActors(): MapInterface;

    public function setSupportingActors(MapInterface $supporting_actors): FabricationFileInterface;

    public function getFileName(): string;

    public function setFileName(string $file_name): FabricationFileInterface;

    public function getFilePath(): string;

    public function setRelativeFilePath(string $relative_file_path): FabricationFileInterface;

    public function setFilePath(string $file_path): FabricationFileInterface;

    public function getRelativeFilePath(): string;

    public function setRelativeDirectoryPath(string $relative_directory_path): FabricationFileInterface;

    public function getRelativeDirectoryPath(): string;
}
