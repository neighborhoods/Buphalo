<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template;

use Neighborhoods\Bradfab\Actor\TemplateInterface;
use Neighborhoods\Bradfab\ActorInterface;
use Neighborhoods\Bradfab\FabricationFile;

interface BuilderInterface
{
    public function build(): TemplateInterface;

    public function setActor(ActorInterface $Actor);

    public function setFabricationFileActor(FabricationFile\ActorInterface $FabricationFileActor);
}
