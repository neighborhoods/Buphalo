<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor;

use Neighborhoods\Buphalo\V1\ActorInterface;
use Neighborhoods\Buphalo\V1\FabricationFile;
use Neighborhoods\Buphalo\V1\FabricationFileInterface;
use Neighborhoods\Buphalo\V1\TargetApplication\RepositoryInterface;

interface BuilderInterface
{
    public function build(): ActorInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);

    public function setTargetApplicationRepository(RepositoryInterface $targetApplicationRepository);
}
