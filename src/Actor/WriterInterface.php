<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use Neighborhoods\Bradfab\Actor\Template\CompilerInterface;
use Neighborhoods\Bradfab\TargetApplicationInterface;

interface WriterInterface
{
    public function setTargetActorTemplateCompiler(CompilerInterface $Compiler);

    public function setTargetApplication(TargetApplicationInterface $TargetApplication);

    public function getTargetActorSourceFilePath();

    public function write(): WriterInterface;
}
