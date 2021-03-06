<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Writer;

use Neighborhoods\Buphalo\V2\Actor\WriterInterface;
use Neighborhoods\Buphalo\V2\FabricationFile\ActorInterface;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFileActor(ActorInterface $FabricationFileActor);

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function build(): WriterInterface;
}
