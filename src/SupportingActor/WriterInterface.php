<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor;

use Rhift\Bradfab\SupportingActor\Template\CompilerInterface;
use Rhift\Bradfab\TargetApplicationInterface;

interface WriterInterface
{
    public function setSupportingActorTemplateCompiler(CompilerInterface $Compiler);

    public function setTargetApplication(TargetApplicationInterface $TargetApplication);

    public function getSupportingActorSourceFilePath();

    public function write(): WriterInterface;
}
