<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Buphalo;

use LogicException;
use Neighborhoods\Buphalo\V1\BuphaloInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloBuphalo;

    public function setBuphalo(BuphaloInterface $buphalo): self
    {
        if ($this->hasBuphalo()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo is already set.');
        }
        $this->NeighborhoodsBuphaloBuphalo = $buphalo;

        return $this;
    }

    protected function getBuphalo(): BuphaloInterface
    {
        if (!$this->hasBuphalo()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo is not set.');
        }

        return $this->NeighborhoodsBuphaloBuphalo;
    }

    protected function hasBuphalo(): bool
    {
        return isset($this->NeighborhoodsBuphaloBuphalo);
    }

    protected function unsetBuphalo(): self
    {
        if (!$this->hasBuphalo()) {
            throw new LogicException('Neighborhoods Buphalo Buphalo is not set.');
        }
        unset($this->NeighborhoodsBuphaloBuphalo);

        return $this;
    }
}
