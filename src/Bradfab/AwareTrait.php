<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Bradfab;

use LogicException;
use Neighborhoods\Bradfab\BradfabInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabBradfab;

    public function setBradfab(BradfabInterface $bradfab): self
    {
        if ($this->hasBradfab()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab is already set.');
        }
        $this->NeighborhoodsBradfabBradfab = $bradfab;

        return $this;
    }

    protected function getBradfab(): BradfabInterface
    {
        if (!$this->hasBradfab()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab is not set.');
        }

        return $this->NeighborhoodsBradfabBradfab;
    }

    protected function hasBradfab(): bool
    {
        return isset($this->NeighborhoodsBradfabBradfab);
    }

    protected function unsetBradfab(): self
    {
        if (!$this->hasBradfab()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab is not set.');
        }
        unset($this->NeighborhoodsBradfabBradfab);

        return $this;
    }
}
