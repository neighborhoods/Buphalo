<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor;

use Neighborhoods\Bradfab\FabricationFile\ActorInterface;

interface TemplateInterface
{
    public function getContents(): string;

    public function setFabricationFileActor(ActorInterface $FabricationFileActor);

    public function getFabricationFileActor(): ActorInterface;

    public function getTemplateActorDirectoryPath(): string;

    public function getFileExtension(): string;

    public function setTemplateActorDirectoryPath(string $template_actor_directory_path): TemplateInterface;

    public function updateContents(string $contents): TemplateInterface;
}