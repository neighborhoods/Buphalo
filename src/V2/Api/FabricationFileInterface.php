<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Api;

use Neighborhoods\Buphalo\V2\StringMapInterface;

interface FabricationFileInterface extends \JsonSerializable
{
    public const PROP_PREFERRED_TEMPLATE_TREES = 'preferred_template_trees';
    public const PROP_ACTORS = 'actors';
    public const PROP_RELATIVE_PATH = 'relative_path';
    public const PROP_PRIMARY_ACTOR_NAME = 'primary_actor_name';

    public function getPreferredTemplateTrees(): StringMapInterface;
    public function setPreferredTemplateTrees(StringMapInterface $preferred_template_trees): FabricationFileInterface;
    public function hasPreferredTemplateTrees(): bool;

    public function getActors(): FabricationFile\Actor\MapInterface;
    public function setActors(FabricationFile\Actor\MapInterface $actors): FabricationFileInterface;

    public function getRelativePath(): string;
    public function setRelativePath(string $relative_path): FabricationFileInterface;

    public function getPrimaryActorName(): string;
    public function setPrimaryActorName(string $primary_actor_name): FabricationFileInterface;
}
