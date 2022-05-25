<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Api;

use Neighborhoods\Buphalo\V2\StringMapInterface;

class FabricationFile implements FabricationFileInterface
{
    /** @var StringMapInterface */
    private $preferred_template_trees;

    /** @var FabricationFile\Actor\MapInterface */
    private $actors;

    /** @var string */
    private $relative_path;

    /** @var string */
    private $primary_actor_name;

    public function getPreferredTemplateTrees(): StringMapInterface
    {
        if ($this->preferred_template_trees === null) {
            throw new \LogicException('preferred_template_trees has not been set');
        }

        return $this->preferred_template_trees;
    }

    public function setPreferredTemplateTrees(StringMapInterface $preferred_template_trees): FabricationFileInterface
    {
        if ($this->preferred_template_trees !== null) {
            throw new \LogicException('preferred_template_trees has already been set');
        }

        $this->preferred_template_trees = $preferred_template_trees;
        return $this;
    }

    public function hasPreferredTemplateTrees(): bool
    {
        return $this->preferred_template_trees !== null;
    }


    public function getActors(): FabricationFile\Actor\MapInterface
    {
        if ($this->actors === null) {
            throw new \LogicException('actors has not been set');
        }

        return $this->actors;
    }

    public function setActors(FabricationFile\Actor\MapInterface $actors): FabricationFileInterface
    {
        if ($this->actors !== null) {
            throw new \LogicException('actors has already been set');
        }

        $this->actors = $actors;
        return $this;
    }

    public function getRelativePath(): string
    {
        if ($this->relative_path === null) {
            throw new \LogicException('FabricationFile relativePath has not been set.');
        }

        return $this->relative_path;
    }

    public function setRelativePath(string $relative_path): FabricationFileInterface
    {
        $this->relative_path = $relative_path;

        return $this;
    }

    public function getPrimaryActorName(): string
    {
        if ($this->primary_actor_name === null) {
            throw new \LogicException('FabricationFile primaryActorName has not been set.');
        }

        return $this->primary_actor_name;
    }

    public function setPrimaryActorName(string $primary_actor_name): FabricationFileInterface
    {
        $this->primary_actor_name = $primary_actor_name;

        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}
