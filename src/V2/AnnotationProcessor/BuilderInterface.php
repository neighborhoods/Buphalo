<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor;

use Neighborhoods\Buphalo\V2\AnnotationProcessorInterface;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;

interface BuilderInterface
{
    public const PROCESSOR_FQCN = 'processor_fqcn';

    public function build(): AnnotationProcessorInterface;

    public function setRecord(array $record): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}
