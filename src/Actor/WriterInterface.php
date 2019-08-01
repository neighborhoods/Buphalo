<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use Neighborhoods\Bradfab\Actor\Template\CompilerInterface;

interface WriterInterface
{
    public function setActorTemplateCompiler(CompilerInterface $Compiler);

    public function write(): WriterInterface;
}
