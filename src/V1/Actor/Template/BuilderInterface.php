<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template;

use Neighborhoods\Buphalo\V1\Actor\TemplateInterface;
use Neighborhoods\Buphalo\V1\ActorInterface;
use Neighborhoods\Buphalo\V1\FabricationFile;

interface BuilderInterface
{
    public function build(): TemplateInterface;

    public function setActor(ActorInterface $Actor);

    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);
}
