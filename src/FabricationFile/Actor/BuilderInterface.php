<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor;

use Neighborhoods\Bradfab\FabricationFile\ActorInterface;

interface BuilderInterface
{
    public const AWARE_OF = 'aware_of';
    public const FABRICATE = 'fabricate';
    public const RELATIVE_TEMPLATE_PATH = 'relative_template_path';
    public const LOOKS_LIKE = 'looks_like';
    public const ANNOTATION_PROCESSORS = 'annotation_processors';

    public function build(): ActorInterface;

    public function setRecord(array $record): BuilderInterface;
}
