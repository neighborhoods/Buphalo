<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Actor;

use Neighborhoods\Bradfab\TemplateTree\ActorInterface;

interface BuilderInterface
{
    public function build(): ActorInterface;

    public function setRecord(array $record): BuilderInterface;
}
