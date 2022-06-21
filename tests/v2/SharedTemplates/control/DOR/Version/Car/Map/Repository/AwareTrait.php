<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map\Repository;

use LogicException;
use Neighborhoods\BuphaloTest\SharedTemplates\DOR\Version\Car\Map\RepositoryInterface;

trait AwareTrait
{
    protected $DORVersionCarMapRepository;

    public function setDORVersionCarMapRepository(RepositoryInterface $CarMapRepository): self
    {
        if ($this->hasDORVersionCarMapRepository()) {
            throw new LogicException('DORVersionCarMapRepository is already set.');
        }
        $this->DORVersionCarMapRepository = $CarMapRepository;

        return $this;
    }

    protected function getDORVersionCarMapRepository(): RepositoryInterface
    {
        if (!$this->hasDORVersionCarMapRepository()) {
            throw new LogicException('DORVersionCarMapRepository is not set.');
        }

        return $this->DORVersionCarMapRepository;
    }

    protected function hasDORVersionCarMapRepository(): bool
    {
        return isset($this->DORVersionCarMapRepository);
    }

    protected function unsetDORVersionCarMapRepository(): self
    {
        if (!$this->hasDORVersionCarMapRepository()) {
            throw new LogicException('DORVersionCarMapRepository is not set.');
        }
        unset($this->DORVersionCarMapRepository);

        return $this;
    }
}
