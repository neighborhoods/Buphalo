<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor\Context;

use Neighborhoods\Buphalo\V2\AnnotationProcessor\ContextInterface;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;

interface BuilderInterface
{
    public const STATIC_CONTEXT_RECORD = 'static_context_record';

    public function build(): ContextInterface;

    public function setRecord(array $record): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}
