<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Buphalo\Builder;

use LogicException;
use Neighborhoods\Buphalo\V2\Buphalo\BuilderInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloBuphaloBuilder;

    public function setBuphaloBuilder(BuilderInterface $buphaloBuilder): self
    {
        if ($this->hasBuphaloBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo Builder is already set.');
        }
        $this->NeighborhoodsBuphaloBuphaloBuilder = $buphaloBuilder;

        return $this;
    }

    protected function getBuphaloBuilder(): BuilderInterface
    {
        if (!$this->hasBuphaloBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo Builder is not set.');
        }

        return $this->NeighborhoodsBuphaloBuphaloBuilder;
    }

    protected function hasBuphaloBuilder(): bool
    {
        return isset($this->NeighborhoodsBuphaloBuphaloBuilder);
    }

    protected function unsetBuphaloBuilder(): self
    {
        if (!$this->hasBuphaloBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo Builder is not set.');
        }
        unset($this->NeighborhoodsBuphaloBuphaloBuilder);

        return $this;
    }
}
