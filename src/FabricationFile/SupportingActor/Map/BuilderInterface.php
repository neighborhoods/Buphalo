<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map;

use Neighborhoods\Bradfab\FabricationFile\SupportingActor\MapInterface;

interface BuilderInterface
{
    public const SUPPORTING_ACTORS = 'supporting_actors';

    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;
}

