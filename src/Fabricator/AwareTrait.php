<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Fabricator;

use Neighborhoods\Bradfab\FabricatorInterface;

trait AwareTrait
{
    protected $Fabricator;

    public function setFabricator(FabricatorInterface $Fabricator): self
    {
        if ($this->hasFabricator()) {
            throw new \LogicException('Fabricator is already set.');
        }
        $this->Fabricator = $Fabricator;

        return $this;
    }

    protected function getFabricator(): FabricatorInterface
    {
        if (!$this->hasFabricator()) {
            throw new \LogicException('Fabricator is not set.');
        }

        return $this->Fabricator;
    }

    protected function hasFabricator(): bool
    {
        return isset($this->Fabricator);
    }

    protected function unsetFabricator(): self
    {
        if (!$this->hasFabricator()) {
            throw new \LogicException('Fabricator is not set.');
        }
        unset($this->Fabricator);

        return $this;
    }
}
