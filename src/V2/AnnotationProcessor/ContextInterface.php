<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor;

use Neighborhoods\Buphalo\V2\FabricationFileInterface;

interface ContextInterface
{
    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function getFabricationFile(): FabricationFileInterface;

    public function getStaticContextRecord(): array;

    public function setStaticContextRecord(array $static_context_record): ContextInterface;

    public function hasStaticContextRecord(): bool;

    public function setAnnotationContents(string $annotation_contents): ContextInterface;

    public function getAnnotationContents(): string;
}
