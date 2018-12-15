<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile;

use Rhift\Bradfab\StringMapInterface;

class SupportingActor implements SupportingActorInterface
{
    protected $relative_class_name;
    protected $enabled;
    protected $aware_of;

    public function isEnabled(): bool
    {
        if ($this->enabled === null) {
            throw new \LogicException('SupportingActor enabled has not been set.');
        }

        return $this->enabled;
    }

    public function setEnabled(bool $enabled): SupportingActorInterface
    {
        if ($this->enabled !== null) {
            throw new \LogicException('SupportingActor enabled is already set.');
        }

        $this->enabled = $enabled;

        return $this;
    }

    public function getAwareOf(): StringMapInterface
    {
        if ($this->aware_of === null) {
            throw new \LogicException('SupportingActor aware_of has not been set.');
        }

        return $this->aware_of;
    }

    public function setAwareOf(StringMapInterface $aware): SupportingActorInterface
    {
        if ($this->aware_of !== null) {
            throw new \LogicException('SupportingActor aware_of is already set.');
        }

        $this->aware_of = $aware;

        return $this;
    }

    public function getRelativeClassName(): string
    {
        if ($this->relative_class_name === null) {
            throw new \LogicException('SupportingActor relative_class_name has not been set.');
        }

        return $this->relative_class_name;
    }

    public function setRelativeClassName(string $relative_class_name): SupportingActorInterface
    {
        if ($this->relative_class_name !== null) {
            throw new \LogicException('SupportingActor relative_class_name is already set.');
        }

        $this->relative_class_name = $relative_class_name;

        return $this;
    }
}
