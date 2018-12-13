<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Rhift\Bradfab\FabricationFile\SupportingActor\MapInterface;

interface FabricationFileInterface
{
    public function getSupportingActors(): MapInterface;

    public function setSupportingActors(MapInterface $supporting_actors): FabricationFileInterface;
}
