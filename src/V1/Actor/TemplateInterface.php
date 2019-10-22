<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor;

use Neighborhoods\Buphalo\V1\ActorInterface;
use Neighborhoods\Buphalo\V1\FabricationFile;
use Neighborhoods\Buphalo\V1\TemplateTree\MapInterface;

interface TemplateInterface
{
    public function getFabricationFileActor(): FabricationFile\ActorInterface;

    public function getContents(): string;

    public function applyTokenizedContents(string $tokenizedContents): TemplateInterface;

    public function setTemplateTreeMap(MapInterface $templateTreeMap);

    public function setActor(ActorInterface $Actor);

    public function applyCompiledContents(string $CompiledContents): TemplateInterface;

    public function getTokenizedContents(): string;

    public function getCompiledContents(): string;

    public function getFilePath(): string;

    public function setFilePath(string $FilePath): TemplateInterface;

    public function setFabricationFileActor(FabricationFile\ActorInterface $getFabricationFileActor);
}
