<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Api;

use Neighborhoods\Buphalo\V1\StringMapInterface;

interface FabricationFileInterface extends \JsonSerializable
{
    public const PROP_PREFERRED_TEMPLATE_TREES = 'preferred_template_trees';
    public const PROP_ACTORS = 'actors';

    public function getPreferredTemplateTrees(): StringMapInterface;
    public function setPreferredTemplateTrees(StringMapInterface $preferred_template_trees): FabricationFileInterface;
    public function hasPreferredTemplateTrees(): bool;

    public function getActors(): FabricationFile\Actor\MapInterface;
    public function setActors(FabricationFile\Actor\MapInterface $actors): FabricationFileInterface;
}
