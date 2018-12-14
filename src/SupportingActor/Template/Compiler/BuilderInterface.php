<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler;

use Rhift\Bradfab\SupportingActor\Template\CompilerInterface;

interface BuilderInterface
{
    public function build(): CompilerInterface;

    public function setRecord(array $record): BuilderInterface;
}
