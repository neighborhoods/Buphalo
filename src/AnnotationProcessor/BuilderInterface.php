<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor;

use Neighborhoods\Buphalo\AnnotationProcessorInterface;
use Neighborhoods\Buphalo\FabricationFileInterface;

interface BuilderInterface
{
    public const PROCESSOR_FQCN = 'processor_fqcn';

    public function build(): AnnotationProcessorInterface;

    public function setRecord(array $record): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}
