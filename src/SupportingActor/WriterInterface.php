<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor;

use Neighborhoods\Bradfab\SupportingActor\Template\CompilerInterface;
use Neighborhoods\Bradfab\TargetApplicationInterface;

interface WriterInterface
{
    public function setSupportingActorTemplateCompiler(CompilerInterface $Compiler);

    public function setTargetApplication(TargetApplicationInterface $TargetApplication);

    public function getSupportingActorSourceFilePath();

    public function write(): WriterInterface;
}
