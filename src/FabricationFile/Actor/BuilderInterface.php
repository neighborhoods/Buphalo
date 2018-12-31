<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor;

use Neighborhoods\Bradfab\FabricationFile\ActorInterface;

interface BuilderInterface
{
    public const AWARE_OF = 'aware_of';
    public const FABRICATE = 'fabricate';

    public function build(): ActorInterface;

    public function setRecord(array $record): BuilderInterface;
}
