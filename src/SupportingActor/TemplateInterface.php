<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor;

use Rhift\Bradfab\FabricationFile\SupportingActorInterface;

interface TemplateInterface
{
    public function getContents(): string;

    public function setFabricationFileSupportingActor(SupportingActorInterface $FabricationFileSupportingActor);

    public function getFabricationFileSupportingActor(): SupportingActorInterface;

    public function getTemplateActorDirectoryPath(): string;

    public function getFileExtension(): string;

    public function setTemplateActorDirectoryPath(string $template_actor_directory_path): TemplateInterface;
}
