<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor;

use Neighborhoods\Bradfab\FabricationFile\SupportingActorInterface;

interface BuilderInterface
{
    public const AWARE_OF = 'aware_of';
    public const FABRICATE = 'fabricate';
    public const RELATIVE_TEMPLATE_PATH = 'relative_template_path';
    public const USE = 'use';
    public const ANNOTATION_PROCESSORS = 'annotation_processors';

    public function build(): SupportingActorInterface;

    public function setRecord(array $record): BuilderInterface;
}
