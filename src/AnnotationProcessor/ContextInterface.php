<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor;

use Rhift\Bradfab\FabricationFileInterface;

interface ContextInterface
{
    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function getStaticContextRecord(): array;

    public function setStaticContextRecord(array $static_context_record): ContextInterface;

    public function hasStaticContextRecord(): bool;
}
