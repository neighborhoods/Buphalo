<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\PropertyReference;

interface CompilerInterface
{
    public function getCompiledContents(): string;
}
