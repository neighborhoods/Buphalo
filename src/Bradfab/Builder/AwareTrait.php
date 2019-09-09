<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Bradfab\Builder;

use LogicException;
use Neighborhoods\Bradfab\Bradfab\BuilderInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabBradfabBuilder;

    public function setBradfabBuilder(BuilderInterface $bradfabBuilder): self
    {
        if ($this->hasBradfabBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab Builder is already set.');
        }
        $this->NeighborhoodsBradfabBradfabBuilder = $bradfabBuilder;

        return $this;
    }

    protected function getBradfabBuilder(): BuilderInterface
    {
        if (!$this->hasBradfabBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab Builder is not set.');
        }

        return $this->NeighborhoodsBradfabBradfabBuilder;
    }

    protected function hasBradfabBuilder(): bool
    {
        return isset($this->NeighborhoodsBradfabBradfabBuilder);
    }

    protected function unsetBradfabBuilder(): self
    {
        if (!$this->hasBradfabBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Bradfab Builder is not set.');
        }
        unset($this->NeighborhoodsBradfabBradfabBuilder);

        return $this;
    }
}
