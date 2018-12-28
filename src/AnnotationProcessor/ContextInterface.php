<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor;

use Neighborhoods\Bradfab\FabricationFileInterface;

interface ContextInterface
{
    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function getStaticContextRecord(): array;

    public function setStaticContextRecord(array $static_context_record): ContextInterface;

    public function hasStaticContextRecord(): bool;

    public function setAnnotationContents(string $annotation_contents): ContextInterface;

    public function getAnnotationContents(): string;
}