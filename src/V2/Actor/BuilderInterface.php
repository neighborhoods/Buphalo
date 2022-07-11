<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor;

use Neighborhoods\Buphalo\V2\ActorInterface;
use Neighborhoods\Buphalo\V2\FabricationFile;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;
use Neighborhoods\Buphalo\V2\TargetApplication\RepositoryInterface;

interface BuilderInterface
{
    public function build(): ActorInterface;

    public function setFabricationFile(FabricationFileInterface $FabricationFile);

    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);

    public function setTargetApplicationRepository(RepositoryInterface $targetApplicationRepository);
}
