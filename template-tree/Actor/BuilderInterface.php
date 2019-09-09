<?php
declare(strict_types=1);

namespace Neighborhoods\BradfabTemplateTree\Actor;

use Neighborhoods\BradfabTemplateTree\ActorInterface;

interface BuilderInterface
{
    public function build(): ActorInterface;

    public function setRecord(array $record): BuilderInterface;
}
