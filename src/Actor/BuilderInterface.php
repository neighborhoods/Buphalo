<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor;

use Neighborhoods\Buphalo\ActorInterface;
use Neighborhoods\Buphalo\FabricationFile;
use Neighborhoods\Buphalo\FabricationFileInterface;
use Neighborhoods\Buphalo\TargetApplication\RepositoryInterface;

interface BuilderInterface
{
    public function build(): ActorInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);

    public function setTargetApplicationRepository(RepositoryInterface $targetApplicationRepository);
}
