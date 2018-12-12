<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\Repository;

use Rhift\Bradfab\FabricationFile\RepositoryInterface;

trait AwareTrait
{
    protected $FabricationFileRepository;

    public function setFabricationFileRepository(RepositoryInterface $FabricationFileRepository): self
    {
        if ($this->hasFabricationFileRepository()) {
            throw new \LogicException('FabricationFileRepository is already set.');
        }
        $this->FabricationFileRepository = $FabricationFileRepository;

        return $this;
    }

    protected function getFabricationFileRepository(): RepositoryInterface
    {
        if (!$this->hasFabricationFileRepository()) {
            throw new \LogicException('FabricationFileRepository is not set.');
        }

        return $this->FabricationFileRepository;
    }

    protected function hasFabricationFileRepository(): bool
    {
        return isset($this->FabricationFileRepository);
    }

    protected function unsetFabricationFileRepository(): self
    {
        if (!$this->hasFabricationFileRepository()) {
            throw new \LogicException('FabricationFileRepository is not set.');
        }
        unset($this->FabricationFileRepository);

        return $this;
    }
}
