<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor;

use Rhift\Bradfab\FabricationFile\SupportingActorInterface;

class Template implements TemplateInterface
{
    protected $fabrication_file_supporting_actor;

    public function getFabricationFileSupportingActor(): SupportingActorInterface
    {
        if ($this->fabrication_file_supporting_actor === null) {
            throw new \LogicException('Template fabrication_file_supporting_actor has not been set.');
        }

        return $this->fabrication_file_supporting_actor;
    }

    public function setFabricationFileSupportingActor(SupportingActorInterface $fabrication_file_supporting_actor
    ): TemplateInterface {
        if ($this->fabrication_file_supporting_actor !== null) {
            throw new \LogicException('Template fabrication_file_supporting_actor is already set.');
        }

        $this->fabrication_file_supporting_actor = $fabrication_file_supporting_actor;

        return $this;
    }
}
