<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor;

use Neighborhoods\Bradfab\FabricationFile\SupportingActorInterface;

interface BuilderInterface
{
    public const AWARE_OF = 'aware_of';
    public const FABRICATE = 'fabricate';

    public function build(): SupportingActorInterface;

    public function setRecord(array $record): BuilderInterface;
}
