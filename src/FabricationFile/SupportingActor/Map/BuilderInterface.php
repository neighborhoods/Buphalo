<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor\Map;

use Rhift\Bradfab\FabricationFile\SupportingActor\MapInterface;

interface BuilderInterface
{
    public const SUPPORTING_ACTORS = 'supporting_actors';
    public const RELATIVE_TEMPLATE_PATH = 'relative_template_path';

    public function build(): MapInterface;

    public function setRecords(array $records): BuilderInterface;
}

