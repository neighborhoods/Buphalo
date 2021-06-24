<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Actor;

use Neighborhoods\Buphalo\V2\FabricationFile\ActorInterface;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;

interface BuilderInterface
{
    public const AWARE_OF = 'aware_of';
    public const FABRICATE = 'fabricate';
    public const GENERATE = 'generate';
    public const TEMPLATE = 'template';
    public const ANNOTATION_PROCESSORS = 'annotation_processors';
    public const PREFERRED_TEMPLATE_TREES = 'preferred_template_trees';
    public const ACTOR_NAME = '<PrimaryActorName>';

    public function build(): ActorInterface;

    public function setRecord(array $record): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}
