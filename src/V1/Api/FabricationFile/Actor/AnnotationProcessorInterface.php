<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Api\FabricationFile\Actor;

interface AnnotationProcessorInterface extends \JsonSerializable
{
    public const PROP_PROCESSOR_FQCN = 'processor_fqcn';
    public const PROP_STATIC_CONTEXT_RECORD = 'static_context_record';

    public function getProcessorFqcn(): string;
    public function setProcessorFqcn(string $processor_fqcn): AnnotationProcessorInterface;

    public function getStaticContextRecord(): array;
    public function setStaticContextRecord(array $static_context_record): AnnotationProcessorInterface;
    public function hasStaticContextRecord(): bool;
}
