<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor;

use Neighborhoods\Bradfab\TargetActor\Template\CompilerInterface;
use Neighborhoods\Bradfab\TargetApplicationInterface;

interface WriterInterface
{
    public function setTargetActorTemplateCompiler(CompilerInterface $Compiler);

    public function setTargetApplication(TargetApplicationInterface $TargetApplication);

    public function getTargetActorSourceFilePath();

    public function write(): WriterInterface;
}
