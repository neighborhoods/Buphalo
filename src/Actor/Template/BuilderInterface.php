<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template;

use Neighborhoods\Buphalo\Actor\TemplateInterface;
use Neighborhoods\Buphalo\ActorInterface;
use Neighborhoods\Buphalo\FabricationFile;

interface BuilderInterface
{
    public function build(): TemplateInterface;

    public function setActor(ActorInterface $Actor);

    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);
}
