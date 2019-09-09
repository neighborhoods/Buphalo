<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer;

use Neighborhoods\Bradfab\Actor\WriterInterface;
use Neighborhoods\Bradfab\FabricationFile\ActorInterface;
use Neighborhoods\Bradfab\FabricationFileInterface;

interface BuilderInterface
{
    public function setFabricationFileActor(ActorInterface $FabricationFileActor);

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function build(): WriterInterface;
}
