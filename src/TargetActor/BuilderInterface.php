<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetActor;

use Rhift\Bradfab\TargetActorInterface;

interface BuilderInterface
{
    public function build(): TargetActorInterface;

    public function setRecord(array $record): BuilderInterface;
}
