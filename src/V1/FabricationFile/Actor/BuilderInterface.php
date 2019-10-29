<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile\Actor;

use Neighborhoods\Buphalo\V1\FabricationFile\ActorInterface;
use Neighborhoods\Buphalo\V1\FabricationFileInterface;

interface BuilderInterface
{
    public const AWARE_OF = 'aware_of';
    public const FABRICATE = 'fabricate';
    public const GENERATE = 'generate';
    public const TEMPLATE = 'template';
    public const ANNOTATION_PROCESSORS = 'annotation_processors';
    public const ACTOR_NAME = '<PrimaryActorName>';

    public function build(): ActorInterface;

    public function setRecord(array $record): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}
