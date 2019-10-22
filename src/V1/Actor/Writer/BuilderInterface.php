<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Writer;

use Neighborhoods\Buphalo\V1\Actor\WriterInterface;
use Neighborhoods\Buphalo\V1\FabricationFile\ActorInterface;
use Neighborhoods\Buphalo\V1\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFileActor(ActorInterface $FabricationFileActor);

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function build(): WriterInterface;
}
