<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor;

use Neighborhoods\Buphalo\Actor\Template\CompilerInterface;

interface WriterInterface
{
    public function setActorTemplateCompiler(CompilerInterface $Compiler);

    public function write(): WriterInterface;
}
