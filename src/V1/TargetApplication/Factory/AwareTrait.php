<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TargetApplication\Factory;

use LogicException;
use Neighborhoods\Buphalo\V1\TargetApplication\FactoryInterface;

trait AwareTrait
{
    protected $TargetApplicationFactory;

    public function setTargetApplicationFactory(FactoryInterface $TargetApplicationFactory): self
    {
        if ($this->hasTargetApplicationFactory()) {
            throw new LogicException('TargetApplicationFactory is already set.');
        }
        $this->TargetApplicationFactory = $TargetApplicationFactory;

        return $this;
    }

    protected function getTargetApplicationFactory(): FactoryInterface
    {
        if (!$this->hasTargetApplicationFactory()) {
            throw new LogicException('TargetApplicationFactory is not set.');
        }

        return $this->TargetApplicationFactory;
    }

    protected function hasTargetApplicationFactory(): bool
    {
        return isset($this->TargetApplicationFactory);
    }

    protected function unsetTargetApplicationFactory(): self
    {
        if (!$this->hasTargetApplicationFactory()) {
            throw new LogicException('TargetApplicationFactory is not set.');
        }
        unset($this->TargetApplicationFactory);

        return $this;
    }
}
