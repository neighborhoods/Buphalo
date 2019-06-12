<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

use Neighborhoods\Bradfab\FabricationFile\Actor;
use Neighborhoods\Bradfab\FabricationFile\SupportingActor;

interface FabricationFileInterface
{
    public const FILE_EXTENSION_FABRICATION = '.fabrication.yml';

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

    public function setSupportingActors(SupportingActor\MapInterface $SupportingActors): FabricationFileInterface;

    public function getSupportingActors(): SupportingActor\MapInterface;

    public function getBaseName(): string;

    public function setBaseName(string $BaseName): FabricationFileInterface;

    public function getDirectoryPath(): string;

    public function setDirectoryPath(string $DirectoryPath): FabricationFileInterface;
}
