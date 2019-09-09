<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Compiler;

use Neighborhoods\Buphalo\Actor\Template\CompilerInterface;
use Neighborhoods\Buphalo\FabricationFile\ActorInterface;
use Neighborhoods\Buphalo\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFileActor(ActorInterface $FabricationFileActor);

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function build(): CompilerInterface;
}
