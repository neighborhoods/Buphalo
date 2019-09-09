<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Actor;

use Neighborhoods\Buphalo\FabricationFile\ActorInterface;
use Neighborhoods\Buphalo\FabricationFileInterface;

interface BuilderInterface
{
    public const AWARE_OF = 'aware_of';
    public const FABRICATE = 'fabricate';
    public const GENERATE = 'generate';
    public const TEMPLATE = 'template';
    public const ANNOTATION_PROCESSORS = 'annotation_processors';
    public const ACTOR_NAME = '<ActorName>';

    public function build(): ActorInterface;

    public function setRecord(array $record): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}
