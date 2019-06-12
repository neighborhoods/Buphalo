<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor;

use Neighborhoods\Bradfab\AnnotationProcessorInterface;
use Neighborhoods\Bradfab\FabricationFileInterface;

interface BuilderInterface
{
    public const PROCESSOR_FQCN = 'processor_fqcn';

    public function build(): AnnotationProcessorInterface;

    public function setRecord(array $record): BuilderInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);
}
