<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor;

use Rhift\Bradfab\FabricationFile\SupportingActorInterface;

interface BuilderInterface
{
    public function build(): SupportingActorInterface;

    public function setRecord(array $record): BuilderInterface;
}
