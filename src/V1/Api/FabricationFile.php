<?php

declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Api;

use Neighborhoods\Buphalo\V1\StringMapInterface;

class FabricationFile implements FabricationFileInterface
{
    /** @var StringMapInterface */
    private $preferred_template_trees;

    /** @var FabricationFile\Actor\MapInterface */
    private $actors;

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


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
