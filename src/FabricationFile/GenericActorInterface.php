<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile;

interface GenericActorInterface
{
    public function setGenerateFileName(string $GenerateFileName): ActorInterface;

    public function getGenerateFileName(): string;

    public function setTemplateFileName(string $TemplateFileName): ActorInterface;

    public function getTemplateFileName(): string;

    public function setTemplateRelativeFilePath(string $TemplateRelativeFilePath): ActorInterface;

    public function getTemplateRelativeFilePath(): string;
}
