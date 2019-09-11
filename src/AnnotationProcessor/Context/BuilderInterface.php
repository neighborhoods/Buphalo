<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Context;

use Neighborhoods\Buphalo\AnnotationProcessor\ContextInterface;
use Neighborhoods\Buphalo\FabricationFileInterface;

interface BuilderInterface
{
    public const STATIC_CONTEXT_RECORD = 'static_context_record';

    public function build(): ContextInterface;

    public function setRecord(array $record): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}
