<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use Neighborhoods\Bradfab\ActorInterface;
use Neighborhoods\Bradfab\TemplateTree\MapInterface;

interface TemplateInterface
{
    public function getContents(): string;

    public function applyTokenizedContents(string $tokenizedContents): TemplateInterface;

    public function setTemplateTreeMap(MapInterface $templateTreeMap);

    public function setActor(ActorInterface $Actor);

    public function applyCompiledContents(string $CompiledContents): TemplateInterface;

    public function getTokenizedContents();

    public function getCompiledContents(): string;

    public function getFilePath();

    public function setFilePath($FilePath): TemplateInterface;
}
