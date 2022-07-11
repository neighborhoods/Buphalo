<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template;

use Neighborhoods\Buphalo\V2\Actor\TemplateInterface;
use Neighborhoods\Buphalo\V2\ActorInterface;
use Neighborhoods\Buphalo\V2\FabricationFile;
use Neighborhoods\Buphalo\V2\FabricationFileInterface;

interface BuilderInterface
{
    public function build(): TemplateInterface;

    public function setActor(ActorInterface $Actor);

    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);

    public function setFabricationFile(FabricationFileInterface $FabricationFileActor);
}
