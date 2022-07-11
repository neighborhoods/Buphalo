<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorNameInterface;

interface BuilderInterface
{
    public function build(): PrimaryActorNameInterface;

    public function setRecord(array $record): BuilderInterface;
}
