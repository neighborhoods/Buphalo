<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Bradfab\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\Bradfab\Builder\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabBradfabBuilderFactory;

    public function setBradfabBuilderFactory(FactoryInterface $bradfabBuilderFactory): self
    {
        if ($this->hasBradfabBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab Builder Factory is already set.');
        }
        $this->NeighborhoodsBradfabBradfabBuilderFactory = $bradfabBuilderFactory;

        return $this;
    }

    protected function getBradfabBuilderFactory(): FactoryInterface
    {
        if (!$this->hasBradfabBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab Builder Factory is not set.');
        }

        return $this->NeighborhoodsBradfabBradfabBuilderFactory;
    }

    protected function hasBradfabBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabBradfabBuilderFactory);
    }

    protected function unsetBradfabBuilderFactory(): self
    {
        if (!$this->hasBradfabBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabBradfabBuilderFactory);

        return $this;
    }
}
