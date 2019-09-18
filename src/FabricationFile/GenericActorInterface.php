<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile;

interface GenericActorInterface
{
    public function setFileName(string $FileName): ActorInterface;

    public function getFileName(): string;

    public function setTemplateFileName(string $TemplateFileName): ActorInterface;

    public function getTemplateFileName(): string;

    public function setTemplateRelativeFilePath(string $TemplateRelativeFilePath): ActorInterface;

    public function getTemplateRelativeFilePath(): string;
}
