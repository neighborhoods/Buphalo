<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Bradfab\Factory;

use LogicException;
use Neighborhoods\Bradfab\Bradfab\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabBradfabFactory;

    public function setBradfabFactory(FactoryInterface $bradfabFactory): self
    {
        if ($this->hasBradfabFactory()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab Factory is already set.');
        }
        $this->NeighborhoodsBradfabBradfabFactory = $bradfabFactory;

        return $this;
    }

    protected function getBradfabFactory(): FactoryInterface
    {
        if (!$this->hasBradfabFactory()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab Factory is not set.');
        }

        return $this->NeighborhoodsBradfabBradfabFactory;
    }

    protected function hasBradfabFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabBradfabFactory);
    }

    protected function unsetBradfabFactory(): self
    {
        if (!$this->hasBradfabFactory()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabBradfabFactory);

        return $this;
    }
}
