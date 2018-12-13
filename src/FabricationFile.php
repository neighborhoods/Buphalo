<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Rhift\Bradfab\FabricationFile\SupportingActor\MapInterface;

class FabricationFile implements FabricationFileInterface
{
    protected $supporting_actors;

    public function getSupportingActors(): MapInterface
    {
        if ($this->supporting_actors === null) {
            throw new \LogicException('FabricationFile supporting_actors has not been set.');
        }

        return $this->supporting_actors;
    }

    public function setSupportingActors(MapInterface $supporting_actors): FabricationFileInterface
    {
        if ($this->supporting_actors !== null) {
            throw new \LogicException('FabricationFile supporting_actors is already set.');
        }

        $this->supporting_actors = $supporting_actors;

        return $this;
    }
}
