<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor;

use Neighborhoods\Buphalo\V2\Actor\Template\CompilerInterface;

interface WriterInterface
{
    public function setActorTemplateCompiler(CompilerInterface $Compiler);
    public function setIgnoreSourceDirectoryFiles(bool $ignoreSourceDirectoryFiles);

    public function write(): WriterInterface;
}
