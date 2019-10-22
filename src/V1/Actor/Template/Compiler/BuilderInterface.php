<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Compiler;

use Neighborhoods\Buphalo\V1\Actor\Template\CompilerInterface;
use Neighborhoods\Buphalo\V1\FabricationFile\ActorInterface;
use Neighborhoods\Buphalo\V1\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFileActor(ActorInterface $FabricationFileActor);

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function build(): CompilerInterface;
}
