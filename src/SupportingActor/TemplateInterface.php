<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor;

use Neighborhoods\Bradfab\FabricationFile\SupportingActorInterface;

interface TemplateInterface
{
    public function getContents(): string;

    public function setFabricationFileSupportingActor(SupportingActorInterface $FabricationFileActor);

    public function getFabricationFileSupportingActor(): SupportingActorInterface;

    public function getTemplateTreeDirectoryPath(): string;

    public function getFileExtension(): string;

    public function setTemplateTreeDirectoryPath(string $template_tree_directory_path): TemplateInterface;

    public function updateContents(string $contents): TemplateInterface;

    public function getPascalCaseName(): string;
}
