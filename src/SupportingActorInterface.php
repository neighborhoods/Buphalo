<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab;

interface SupportingActorInterface extends GenericActorInterface
{
    public function setFabricationFileSupportingActor(FabricationFile\SupportingActorInterface $FabricationFileActor);

    public function setActor(ActorInterface $Actor);
}
