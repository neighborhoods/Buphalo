<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler;

use Neighborhoods\Bradfab\Actor\Template\CompilerInterface;
use Neighborhoods\Bradfab\FabricationFile\ActorInterface;
use Neighborhoods\Bradfab\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFileActor(ActorInterface $FabricationFileActor);

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function build(): CompilerInterface;
}
