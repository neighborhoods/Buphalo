<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor;

use Neighborhoods\Buphalo\V1\Actor\Template\CompilerInterface;

interface WriterInterface
{
    public function setActorTemplateCompiler(CompilerInterface $Compiler);

    public function write(): WriterInterface;
}
