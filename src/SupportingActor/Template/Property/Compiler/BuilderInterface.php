<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Property\Compiler;

use Rhift\Bradfab\SupportingActor\Template\Property\CompilerInterface;

interface BuilderInterface
{
    public function build(): CompilerInterface;

    public function setRecord(array $record): BuilderInterface;
}
