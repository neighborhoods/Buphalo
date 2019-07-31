<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use Neighborhoods\Bradfab\ActorInterface;
use Neighborhoods\Bradfab\FabricationFile;
use Neighborhoods\Bradfab\FabricationFileInterface;
use Neighborhoods\Bradfab\TargetApplication\RepositoryInterface;

interface BuilderInterface
{
    public function build(): ActorInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);

    public function setTargetApplicationRepository(RepositoryInterface $targetApplicationRepository);
}
