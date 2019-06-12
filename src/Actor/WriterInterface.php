<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use Neighborhoods\Bradfab\Actor\Template\CompilerInterface;
use Neighborhoods\Bradfab\TargetApplicationInterface;

interface WriterInterface
{
    public function setActorTemplateCompiler(CompilerInterface $Compiler);

    public function setTargetApplication(TargetApplicationInterface $TargetApplication);

    public function getActorSourceFilePath(): string;

    public function write(): WriterInterface;
}
