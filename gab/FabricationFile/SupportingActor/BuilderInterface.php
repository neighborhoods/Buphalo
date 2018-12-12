<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor;

interface BuilderInterface
{
    public function setRecord(array $record): BuilderInterface;
}
